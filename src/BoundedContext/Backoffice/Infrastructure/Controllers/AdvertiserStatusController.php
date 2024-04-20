<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AdvertiserStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyAdvertiserStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreAdvertiserStatusRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateAdvertiserStatusRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdvertiserStatusController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('advertiser_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AdvertiserStatus::query()->select(sprintf('%s.*', (new AdvertiserStatus)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'advertiser_status_show';
                $editGate      = 'advertiser_status_edit';
                $deleteGate    = 'advertiser_status_delete';
                $crudRoutePart = 'advertiser-statuses';

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

        return view('backoffice.temp.advertiserStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('advertiser_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.advertiserStatuses.create');
    }

    public function store(StoreAdvertiserStatusRequest $request)
    {
        $advertiserStatus = AdvertiserStatus::create($request->all());

        return redirect()->route('backoffice.advertiser-statuses.index');
    }

    public function edit(AdvertiserStatus $advertiserStatus)
    {
        abort_if(Gate::denies('advertiser_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.advertiserStatuses.edit', compact('advertiserStatus'));
    }

    public function update(UpdateAdvertiserStatusRequest $request, AdvertiserStatus $advertiserStatus)
    {
        $advertiserStatus->update($request->all());

        return redirect()->route('backoffice.advertiser-statuses.index');
    }

    public function show(AdvertiserStatus $advertiserStatus)
    {
        abort_if(Gate::denies('advertiser_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('backoffice.temp.advertiserStatuses.show', compact('advertiserStatus'));
    }

    public function destroy(AdvertiserStatus $advertiserStatus)
    {
        abort_if(Gate::denies('advertiser_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiserStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertiserStatusRequest $request)
    {
        $advertiserStatuses = AdvertiserStatus::find(request('ids'));

        foreach ($advertiserStatuses as $advertiserStatus) {
            $advertiserStatus->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
