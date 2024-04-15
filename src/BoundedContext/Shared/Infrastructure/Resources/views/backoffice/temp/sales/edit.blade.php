@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sale.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.sales.update", [$sale->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.sale.fields.product') }}</label>
                <select class="form-control select2 {{ $errors->has('product') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_id') ? old('product_id') : $sale->product->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <span class="text-danger">{{ $errors->first('product') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.product_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="advertiser_id">{{ trans('cruds.sale.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('advertiser') ? 'is-invalid' : '' }}" name="advertiser_id" id="advertiser_id">
                    @foreach($clients as $id => $entry)
                        <option value="{{ $id }}" {{ (old('advertiser_id') ? old('advertiser_id') : $sale->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.advertiser_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tracking_id">{{ trans('cruds.sale.fields.tracking') }}</label>
                <select class="form-control select2 {{ $errors->has('tracking') ? 'is-invalid' : '' }}" name="tracking_id" id="tracking_id">
                    @foreach($trackings as $id => $entry)
                        <option value="{{ $id }}" {{ (old('tracking_id') ? old('tracking_id') : $sale->tracking->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tracking'))
                    <span class="text-danger">{{ $errors->first('tracking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sale.fields.tracking_helper') }}</span>
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
