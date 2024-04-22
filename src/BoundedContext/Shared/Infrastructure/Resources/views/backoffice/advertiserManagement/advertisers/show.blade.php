@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advertiser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.advertisers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.id') }}
                        </th>
                        <td>
                            {{ $advertiser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.first_name') }}
                        </th>
                        <td>
                            {{ $advertiser->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.last_name') }}
                        </th>
                        <td>
                            {{ $advertiser->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.company') }}
                        </th>
                        <td>
                            {{ $advertiser->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.email') }}
                        </th>
                        <td>
                            {{ $advertiser->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.phone') }}
                        </th>
                        <td>
                            {{ $advertiser->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.website') }}
                        </th>
                        <td>
                            {{ $advertiser->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.skype') }}
                        </th>
                        <td>
                            {{ $advertiser->skype }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.country') }}
                        </th>
                        <td>
                            {{ $advertiser->country }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advertiser.fields.status') }}
                        </th>
                        <td>
                            {{ $advertiser->status->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.advertisers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
