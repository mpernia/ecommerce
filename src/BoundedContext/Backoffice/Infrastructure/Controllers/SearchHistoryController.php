<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\SearchHistory;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroySearchHistoryRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreSearchHistoryRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateSearchHistoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SearchHistoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('search_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SearchHistory::with(['created_by'])->select(sprintf('%s.*', (new SearchHistory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'search_history_show';
                $editGate      = 'search_history_edit';
                $deleteGate    = 'search_history_delete';
                $crudRoutePart = 'search-histories';

                return view('partials.backoffice.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });
            $table->editColumn('counter', function ($row) {
                return $row->counter ? $row->counter : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active']);

            return $table->make(true);
        }

        return view('backoffice.searchHistories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('search_history_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.searchHistories.create');
    }

    public function store(StoreSearchHistoryRequest $request)
    {
        $searchHistory = SearchHistory::create($request->all());

        return redirect()->route('backoffice.search-histories.index');
    }

    public function edit(SearchHistory $searchHistory)
    {
        abort_if(Gate::denies('search_history_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $searchHistory->load('created_by');

        return view('backoffice.searchHistories.edit', compact('searchHistory'));
    }

    public function update(UpdateSearchHistoryRequest $request, SearchHistory $searchHistory)
    {
        $searchHistory->update($request->all());

        return redirect()->route('backoffice.search-histories.index');
    }

    public function show(SearchHistory $searchHistory)
    {
        abort_if(Gate::denies('search_history_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $searchHistory->load('created_by');

        return view('backoffice.searchHistories.show', compact('searchHistory'));
    }

    public function destroy(SearchHistory $searchHistory)
    {
        abort_if(Gate::denies('search_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $searchHistory->delete();

        return back();
    }

    public function massDestroy(MassDestroySearchHistoryRequest $request)
    {
        $searchHistories = SearchHistory::find(request('ids'));

        foreach ($searchHistories as $searchHistory) {
            $searchHistory->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
