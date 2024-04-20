<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\AffiliateCampaign;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Lead;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyLeadRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreLeadRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateLeadRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('lead_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Lead::with(['affiliate_campaign'])->select(sprintf('%s.*', (new Lead)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'lead_show';
                $editGate      = 'lead_edit';
                $deleteGate    = 'lead_delete';
                $crudRoutePart = 'leads';

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
            $table->addColumn('affiliate_campaign_is_active', function ($row) {
                return $row->affiliate_campaign ? $row->affiliate_campaign->is_active : '';
            });

            $table->editColumn('tracking', function ($row) {
                return $row->tracking ? $row->tracking : '';
            });
            $table->editColumn('mobile', function ($row) {
                return $row->mobile ? $row->mobile : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'affiliate_campaign']);

            return $table->make(true);
        }

        return view('backoffice.temp.leads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate_campaigns = AffiliateCampaign::pluck('is_active', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.leads.create', compact('affiliate_campaigns'));
    }

    public function store(StoreLeadRequest $request)
    {
        $lead = Lead::create($request->all());

        return redirect()->route('backoffice.leads.index');
    }

    public function edit(Lead $lead)
    {
        abort_if(Gate::denies('lead_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affiliate_campaigns = AffiliateCampaign::pluck('is_active', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lead->load('affiliate_campaign');

        return view('backoffice.temp.leads.edit', compact('affiliate_campaigns', 'lead'));
    }

    public function update(UpdateLeadRequest $request, Lead $lead)
    {
        $lead->update($request->all());

        return redirect()->route('backoffice.leads.index');
    }

    public function show(Lead $lead)
    {
        abort_if(Gate::denies('lead_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->load('affiliate_campaign');

        return view('backoffice.temp.leads.show', compact('lead'));
    }

    public function destroy(Lead $lead)
    {
        abort_if(Gate::denies('lead_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lead->delete();

        return back();
    }

    public function massDestroy(MassDestroyLeadRequest $request)
    {
        $leads = Lead::find(request('ids'));

        foreach ($leads as $lead) {
            $lead->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
