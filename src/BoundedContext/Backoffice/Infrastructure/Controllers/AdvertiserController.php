<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AdvertiserStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyAdvertiserRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreAdvertiserRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateAdvertiserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AdvertiserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('advertiser_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Advertiser::with(['status', 'created_by'])->select(sprintf('%s.*', (new Advertiser)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'advertiser_show';
                $editGate      = 'advertiser_edit';
                $deleteGate    = 'advertiser_delete';
                $crudRoutePart = 'advertisers';

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
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : '';
            });
            $table->editColumn('skype', function ($row) {
                return $row->skype ? $row->skype : '';
            });
            $table->editColumn('country', function ($row) {
                return $row->country ? $row->country : '';
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'status']);

            return $table->make(true);
        }

        return view('backoffice.temp.advertisers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('advertiser_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = AdvertiserStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.advertisers.create', compact('statuses'));
    }

    public function store(StoreAdvertiserRequest $request)
    {
        $advertiser = Advertiser::create($request->all());

        return redirect()->route('backoffice.advertisers.index');
    }

    public function edit(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = AdvertiserStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $advertiser->load('status', 'created_by');

        return view('backoffice.temp.advertisers.edit', compact('advertiser', 'statuses'));
    }

    public function update(UpdateAdvertiserRequest $request, Advertiser $advertiser)
    {
        $advertiser->update($request->all());

        return redirect()->route('backoffice.advertisers.index');
    }

    public function show(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiser->load('status', 'created_by');

        return view('backoffice.temp.advertisers.show', compact('advertiser'));
    }

    public function destroy(Advertiser $advertiser)
    {
        abort_if(Gate::denies('advertiser_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertiser->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdvertiserRequest $request)
    {
        $advertisers = Advertiser::find(request('ids'));

        foreach ($advertisers as $advertiser) {
            $advertiser->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
