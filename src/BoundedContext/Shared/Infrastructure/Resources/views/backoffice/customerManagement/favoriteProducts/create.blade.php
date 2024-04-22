@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.favoriteProduct.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.favorite-products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.favoriteProduct.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.favoriteProduct.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.favoriteProduct.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '0') }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.favoriteProduct.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price_target">{{ trans('cruds.favoriteProduct.fields.price_target') }}</label>
                <input class="form-control {{ $errors->has('price_target') ? 'is-invalid' : '' }}" type="number" name="price_target" id="price_target" value="{{ old('price_target', '0') }}" step="0.01" required>
                @if($errors->has('price_target'))
                    <span class="text-danger">{{ $errors->first('price_target') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.favoriteProduct.fields.price_target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.favoriteProduct.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.favoriteProduct.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection