@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sale.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.id') }}
                        </th>
                        <td>
                            {{ $sale->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.product') }}
                        </th>
                        <td>
                            {{ $sale->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.advertiser') }}
                        </th>
                        <td>
                            {{ $sale->advertiser->company ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sale.fields.tracking') }}
                        </th>
                        <td>
                            {{ $sale->tracking->tracking ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.sales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
