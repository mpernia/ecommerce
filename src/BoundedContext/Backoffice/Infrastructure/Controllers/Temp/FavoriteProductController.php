<?php

namespace Ecommerce\BoundedContext\Backoffice\Infrastructure\Controllers\Temp;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\FavoriteProduct;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\Product;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\MassDestroyFavoriteProductRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\StoreFavoriteProductRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp\UpdateFavoriteProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class FavoriteProductController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('favorite_product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = FavoriteProduct::with(['product', 'created_by'])->select(sprintf('%s.*', (new FavoriteProduct)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'favorite_product_show';
                $editGate      = 'favorite_product_edit';
                $deleteGate    = 'favorite_product_delete';
                $crudRoutePart = 'favorite-products';

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
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('price_target', function ($row) {
                return $row->price_target ? $row->price_target : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_active', 'product']);

            return $table->make(true);
        }

        return view('backoffice.temp.favoriteProducts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('favorite_product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('backoffice.temp.favoriteProducts.create', compact('products'));
    }

    public function store(StoreFavoriteProductRequest $request)
    {
        $favoriteProduct = FavoriteProduct::create($request->all());

        return redirect()->route('backoffice.favorite-products.index');
    }

    public function edit(FavoriteProduct $favoriteProduct)
    {
        abort_if(Gate::denies('favorite_product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $favoriteProduct->load('product', 'created_by');

        return view('backoffice.temp.favoriteProducts.edit', compact('favoriteProduct', 'products'));
    }

    public function update(UpdateFavoriteProductRequest $request, FavoriteProduct $favoriteProduct)
    {
        $favoriteProduct->update($request->all());

        return redirect()->route('backoffice.favorite-products.index');
    }

    public function show(FavoriteProduct $favoriteProduct)
    {
        abort_if(Gate::denies('favorite_product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favoriteProduct->load('product', 'created_by');

        return view('backoffice.temp.favoriteProducts.show', compact('favoriteProduct'));
    }

    public function destroy(FavoriteProduct $favoriteProduct)
    {
        abort_if(Gate::denies('favorite_product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $favoriteProduct->delete();

        return back();
    }

    public function massDestroy(MassDestroyFavoriteProductRequest $request)
    {
        $favoriteProducts = FavoriteProduct::find(request('ids'));

        foreach ($favoriteProducts as $favoriteProduct) {
            $favoriteProduct->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
