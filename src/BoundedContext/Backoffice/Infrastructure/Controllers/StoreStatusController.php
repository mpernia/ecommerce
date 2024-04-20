<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\StoreStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyStoreStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreStoreStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateStoreStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StoreStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('store_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StoreStatus::query()->select(sprintf('%s.*', (new StoreStatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'store_status_show';
                $editGate      = 'store_status_edit';
                $deleteGate    = 'store_status_delete';
                $crudRoutePart = 'store-statuses';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('backoffice.temp.storeStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('store_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.storeStatuses.create');
    }

    public function store(StoreStoreStatusRequest $request)
    {
        $storeStatus = StoreStatus::create($request->all());

        return redirect()->route('backoffice.store-statuses.index');
    }

    public function edit(StoreStatus $storeStatus)
    {
        abort_if(Gate::denies('store_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.storeStatuses.edit', compact('storeStatus'));
    }

    public function update(UpdateStoreStatusRequest $request, StoreStatus $storeStatus)
    {
        $storeStatus->update($request->all());

        return redirect()->route('backoffice.store-statuses.index');
    }

    public function show(StoreStatus $storeStatus)
    {
        abort_if(Gate::denies('store_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.storeStatuses.show', compact('storeStatus'));
    }

    public function destroy(StoreStatus $storeStatus)
    {
        abort_if(Gate::denies('store_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $storeStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyStoreStatusRequest $request)
    {
        $storeStatuses = StoreStatus::find(request('ids'));

        foreach ($storeStatuses as $storeStatus) {
            $storeStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
