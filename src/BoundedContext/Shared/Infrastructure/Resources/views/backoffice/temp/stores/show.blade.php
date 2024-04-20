@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.store.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.id') }}
                        </th>
                        <td>
                            {{ $store->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.name') }}
                        </th>
                        <td>
                            {{ $store->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.advertiser') }}
                        </th>
                        <td>
                            {{ $store->client->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.description') }}
                        </th>
                        <td>
                            {{ $store->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.start_date') }}
                        </th>
                        <td>
                            {{ $store->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.budget') }}
                        </th>
                        <td>
                            {{ $store->budget }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.store.fields.status') }}
                        </th>
                        <td>
                            {{ $store->status->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.stores.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
