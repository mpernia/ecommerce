<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\IncomeSource;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyIncomeSourceRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreIncomeSourceRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateIncomeSourceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class IncomeSourceController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('income_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = IncomeSource::query()->select(sprintf('%s.*', (new IncomeSource)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'income_source_show';
                $editGate      = 'income_source_edit';
                $deleteGate    = 'income_source_delete';
                $crudRoutePart = 'income-sources';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('fee_percent', function ($row) {
                return $row->fee_percent ? $row->fee_percent : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('backoffice.incomeSources.index');
    }

    public function create()
    {
        abort_if(Gate::denies('income_source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.incomeSources.create');
    }

    public function store(StoreIncomeSourceRequest $request)
    {
        $incomeSource = IncomeSource::create($request->all());

        return redirect()->route('backoffice.income-sources.index');
    }

    public function edit(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.incomeSources.edit', compact('incomeSource'));
    }

    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        $incomeSource->update($request->all());

        return redirect()->route('backoffice.income-sources.index');
    }

    public function show(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.incomeSources.show', compact('incomeSource'));
    }

    public function destroy(IncomeSource $incomeSource)
    {
        abort_if(Gate::denies('income_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $incomeSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeSourceRequest $request)
    {
        $incomeSources = IncomeSource::find(request('ids'));

        foreach ($incomeSources as $incomeSource) {
            $incomeSource->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
