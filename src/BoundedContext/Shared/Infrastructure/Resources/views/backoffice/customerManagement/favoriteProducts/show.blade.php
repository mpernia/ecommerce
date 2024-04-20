@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.favoriteProduct.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.favorite-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.favoriteProduct.fields.id') }}
                        </th>
                        <td>
                            {{ $favoriteProduct->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.favoriteProduct.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $favoriteProduct->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.favoriteProduct.fields.price') }}
                        </th>
                        <td>
                            {{ $favoriteProduct->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.favoriteProduct.fields.price_target') }}
                        </th>
                        <td>
                            {{ $favoriteProduct->price_target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.favoriteProduct.fields.product') }}
                        </th>
                        <td>
                            {{ $favoriteProduct->product->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.favorite-products.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection