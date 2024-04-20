<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Affiliate;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\AffiliateCampaign;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Campaign;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyAffiliateCampaignRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreAffiliateCampaignRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateAffiliateCampaignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AffiliateCampaignController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('affiliate_campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AffiliateCampaign::with(['affiliate', 'campaign', 'created_by'])->select(sprintf('%s.*', (new AffiliateCampaign)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'affiliate_campaign_show';
                $editGate      = 'affiliate_campaign_edit';
                $deleteGate    = 'affiliate_campaign_delete';
                $crudRoutePart = 'affiliate-campaigns';

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
            $table->addColumn('affiliate_name', function ($row) {
                return $row->affiliate ? $row->affiliate->name : '';
            });

            $table->addColumn('campaign_url', function ($row) {
                return $row->campaign ? $row->campaign->url : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active', 'affiliate', 'campaign']);

            return $table->make(true);
        }

        return view('backoffice.temp.affiliateCampaigns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('affiliate_campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliates = Affiliate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaigns = Campaign::pluck('url', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.affiliateCampaigns.create', compact('affiliates', 'campaigns'));
    }

    public function store(StoreAffiliateCampaignRequest $request)
    {
        $affiliateCampaign = AffiliateCampaign::create($request->all());

        return redirect()->route('backoffice.affiliate-campaigns.index');
    }

    public function edit(AffiliateCampaign $affiliateCampaign)
    {
        abort_if(Gate::denies('affiliate_campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliates = Affiliate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $campaigns = Campaign::pluck('url', 'id')->prepend(trans('global.pleaseSelect'), '');

        $affiliateCampaign->load('affiliate', 'campaign', 'created_by');

        return view('backoffice.temp.affiliateCampaigns.edit', compact('affiliateCampaign', 'affiliates', 'campaigns'));
    }

    public function update(UpdateAffiliateCampaignRequest $request, AffiliateCampaign $affiliateCampaign)
    {
        $affiliateCampaign->update($request->all());

        return redirect()->route('backoffice.affiliate-campaigns.index');
    }

    public function show(AffiliateCampaign $affiliateCampaign)
    {
        abort_if(Gate::denies('affiliate_campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliateCampaign->load('affiliate', 'campaign', 'created_by');

        return view('backoffice.temp.affiliateCampaigns.show', compact('affiliateCampaign'));
    }

    public function destroy(AffiliateCampaign $affiliateCampaign)
    {
        abort_if(Gate::denies('affiliate_campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliateCampaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffiliateCampaignRequest $request)
    {
        $affiliateCampaigns = AffiliateCampaign::find(request('ids'));

        foreach ($affiliateCampaigns as $affiliateCampaign) {
            $affiliateCampaign->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
