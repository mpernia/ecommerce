<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Advertiser;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Lead;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Product;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Temp\Sale;
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
            $query = Sale::with(['product', 'client', 'tracking'])->select(sprintf('%s.*', (new Sale)->table));
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
                return $row->client ? $row->client->company : '';
            });

            $table->addColumn('tracking_tracking', function ($row) {
                return $row->tracking ? $row->tracking->tracking : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'product', 'client', 'tracking']);

            return $table->make(true);
        }

        return view('backoffice.temp.sales.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sale_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Advertiser::pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trackings = Lead::pluck('tracking', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.sales.create', compact('clients', 'products', 'trackings'));
    }

    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all());

        return redirect()->route('admin.sales.index');
    }

    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Advertiser::pluck('company', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trackings = Lead::pluck('tracking', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sale->load('product', 'client', 'tracking');

        return view('backoffice.temp.sales.edit', compact('clients', 'products', 'sale', 'trackings'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $sale->update($request->all());

        return redirect()->route('admin.sales.index');
    }

    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sale->load('product', 'client', 'tracking');

        return view('backoffice.temp.sales.show', compact('sale'));
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