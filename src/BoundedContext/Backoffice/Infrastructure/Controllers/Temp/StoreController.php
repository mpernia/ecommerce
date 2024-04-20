<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Store;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\StoreStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyProjectRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreProjectRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('store_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Store::with(['client', 'status', 'created_by'])->select(sprintf('%s.*', (new Store)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'store_show';
                $editGate      = 'store_edit';
                $deleteGate    = 'store_delete';
                $crudRoutePart = 'stores';

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
            $table->addColumn('advertiser_first_name', function ($row) {
                return $row->client ? $row->client->first_name : '';
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('budget', function ($row) {
                return $row->budget ? $row->budget : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'client', 'status']);

            return $table->make(true);
        }

        return view('backoffice.temp.stores.index');
    }

    public function create()
    {
        abort_if(Gate::denies('store_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Advertiser::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StoreStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.stores.create', compact('clients', 'statuses'));
    }

    public function store(StoreProjectRequest $request)
    {
        $store = Store::create($request->all());

        return redirect()->route('backoffice.stores.index');
    }

    public function edit(Store $store)
    {
        abort_if(Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Advertiser::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = StoreStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $store->load('client', 'status', 'created_by');

        return view('backoffice.temp.stores.edit', compact('clients', 'store', 'statuses'));
    }

    public function update(UpdateProjectRequest $request, Store $store)
    {
        $store->update($request->all());

        return redirect()->route('backoffice.stores.index');
    }

    public function show(Store $store)
    {
        abort_if(Gate::denies('store_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->load('client', 'status', 'created_by');

        return view('backoffice.temp.stores.show', compact('store'));
    }

    public function destroy(Store $store)
    {
        abort_if(Gate::denies('store_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectRequest $request)
    {
        $stores = Store::find(request('ids'));

        foreach ($stores as $store) {
            $store->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
