<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Affiliate;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AffiliateStatus;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyAffiliateRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreAffiliateRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateAffiliateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AffiliateController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('affiliate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Affiliate::with(['advertisers', 'status', 'created_by'])->select(sprintf('%s.*', (new Affiliate)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'affiliate_show';
                $editGate      = 'affiliate_edit';
                $deleteGate    = 'affiliate_delete';
                $crudRoutePart = 'affiliates';

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
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('budget', function ($row) {
                return $row->budget ? $row->budget : '';
            });
            $table->editColumn('advertiser', function ($row) {
                $labels = [];
                foreach ($row->advertisers as $advertiser) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $advertiser->first_name);
                }

                return implode(' ', $labels);
            });
            $table->addColumn('status_name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'advertiser', 'status']);

            return $table->make(true);
        }

        return view('backoffice.affiliateManagement.affiliates.index');
    }

    public function create()
    {
        abort_if(Gate::denies('affiliate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisers = Advertiser::pluck('first_name', 'id');

        $statuses = AffiliateStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.affiliateManagement.affiliates.create', compact('advertisers', 'statuses'));
    }

    public function store(StoreAffiliateRequest $request)
    {
        $affiliate = Affiliate::create($request->all());
        $affiliate->advertisers()->sync($request->input('advertisers', []));

        return redirect()->route('backoffice.affiliates.index');
    }

    public function edit(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $advertisers = Advertiser::pluck('first_name', 'id');

        $statuses = AffiliateStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $affiliate->load('advertisers', 'status', 'created_by');

        return view('backoffice.affiliateManagement.affiliates.edit', compact('affiliate', 'advertisers', 'statuses'));
    }

    public function update(UpdateAffiliateRequest $request, Affiliate $affiliate)
    {
        $affiliate->update($request->all());
        $affiliate->advertisers()->sync($request->input('advertisers', []));

        return redirect()->route('backoffice.affiliates.index');
    }

    public function show(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate->load('advertisers', 'status', 'created_by');

        return view('backoffice.affiliateManagement.affiliates.show', compact('affiliate'));
    }

    public function destroy(Affiliate $affiliate)
    {
        abort_if(Gate::denies('affiliate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffiliateRequest $request)
    {
        $affiliates = Affiliate::find(request('ids'));

        foreach ($affiliates as $affiliate) {
            $affiliate->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
