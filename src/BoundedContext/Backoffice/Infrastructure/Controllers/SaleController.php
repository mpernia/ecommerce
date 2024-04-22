<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Lead;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Product;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Sale;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroySaleRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreSaleRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateSaleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sale_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sale::with(['product', 'advertiser', 'tracking'])->select(sprintf('%s.*', (new Sale)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sale_show';
                $editGate      = 'sale_edit';
                $deleteGate    = 'sale_delete';
                $crudRoutePart = 'sales';

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
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->addColumn('advertiser_company', function ($row) {
                return $row->advertiser ? $row->advertiser->company : '';
            });

            $table->addColumn('tracking_tracking', function ($row) {
                return $row->tracking ? $row->tracking->tracking : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'advertiser', 'tracking']);

            return $table->make(true);
        }

        return view('backoffice.advertiserManagement.sales.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $advertisers = Advertiser::pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trackings = Lead::pluck('tracking', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.advertiserManagement.sales.create', compact('advertisers', 'products', 'trackings'));
    }

    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all());

        return redirect()->route('backoffice.sales.index');
    }

    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $advertisers = Advertiser::pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trackings = Lead::pluck('tracking', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('product', 'advertiser', 'tracking');

        return view('backoffice.advertiserManagement.sales.edit', compact('advertisers', 'products', 'sale', 'trackings'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());

        return redirect()->route('backoffice.sales.index');
    }

    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->load('product', 'advertiser', 'tracking');

        return view('backoffice.advertiserManagement.sales.show', compact('sale'));
    }

    public function destroy(Sale $sale)
    {
        abort_if(Gate::denies('sale_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->delete();

        return back();
    }

    public function massDestroy(MassDestroySaleRequest $request)
    {
        $sales = Sale::find(request('ids'));

        foreach ($sales as $sale) {
            $sale->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
