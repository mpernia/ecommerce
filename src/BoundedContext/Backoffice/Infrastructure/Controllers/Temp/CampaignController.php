<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Campaign;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Product;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyCampaignRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreCampaignRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateCampaignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('campaign_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Campaign::with(['products', 'created_by'])->select(sprintf('%s.*', (new Campaign)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'campaign_show';
                $editGate      = 'campaign_edit';
                $deleteGate    = 'campaign_delete';
                $crudRoutePart = 'campaigns';

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
            $table->editColumn('is_active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_active ? 'checked' : null) . '>';
            });
            $table->editColumn('url', function ($row) {
                return $row->url ? $row->url : '';
            });
            $table->editColumn('utm_source', function ($row) {
                return $row->utm_source ? $row->utm_source : '';
            });
            $table->editColumn('utm_medium', function ($row) {
                return $row->utm_medium ? Campaign::UTM_MEDIUM_SELECT[$row->utm_medium] : '';
            });
            $table->editColumn('utm_campaign', function ($row) {
                return $row->utm_campaign ? $row->utm_campaign : '';
            });
            $table->editColumn('utm_term', function ($row) {
                return $row->utm_term ? $row->utm_term : '';
            });
            $table->editColumn('utm_content', function ($row) {
                return $row->utm_content ? $row->utm_content : '';
            });
            $table->editColumn('pay_per_clic', function ($row) {
                return $row->pay_per_clic ? $row->pay_per_clic : '';
            });
            $table->editColumn('cost_per_lead', function ($row) {
                return $row->cost_per_lead ? $row->cost_per_lead : '';
            });
            $table->editColumn('cost_per_acquisition', function ($row) {
                return $row->cost_per_acquisition ? $row->cost_per_acquisition : '';
            });
            $table->editColumn('cost_per_clic', function ($row) {
                return $row->cost_per_clic ? $row->cost_per_clic : '';
            });
            $table->editColumn('persent_per_sale', function ($row) {
                return $row->persent_per_sale ? $row->persent_per_sale : '';
            });
            $table->editColumn('product', function ($row) {
                $labels = [];
                foreach ($row->products as $product) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $product->name);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active', 'product']);

            return $table->make(true);
        }

        return view('backoffice.temp.campaigns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('campaign_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        return view('backoffice.temp.campaigns.create', compact('products'));
    }

    public function store(StoreCampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());
        $campaign->products()->sync($request->input('products', []));

        return redirect()->route('backoffice.campaigns.index');
    }

    public function edit(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id');

        $campaign->load('products', 'created_by');

        return view('backoffice.temp.campaigns.edit', compact('campaign', 'products'));
    }

    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $campaign->update($request->all());
        $campaign->products()->sync($request->input('products', []));

        return redirect()->route('backoffice.campaigns.index');
    }

    public function show(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->load('products', 'created_by');

        return view('backoffice.temp.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        abort_if(Gate::denies('campaign_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $campaign->delete();

        return back();
    }

    public function massDestroy(MassDestroyCampaignRequest $request)
    {
        $campaigns = Campaign::find(request('ids'));

        foreach ($campaigns as $campaign) {
            $campaign->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
