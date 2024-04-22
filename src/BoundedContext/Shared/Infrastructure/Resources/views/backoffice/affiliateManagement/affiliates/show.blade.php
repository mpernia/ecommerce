@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.affiliate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.affiliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.id') }}
                        </th>
                        <td>
                            {{ $affiliate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.name') }}
                        </th>
                        <td>
                            {{ $affiliate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.description') }}
                        </th>
                        <td>
                            {{ $affiliate->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.start_date') }}
                        </th>
                        <td>
                            {{ $affiliate->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.budget') }}
                        </th>
                        <td>
                            {{ $affiliate->budget }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.advertiser') }}
                        </th>
                        <td>
                            @foreach($affiliate->advertisers as $key => $advertiser)
                                <span class="label label-info">{{ $advertiser->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.affiliate.fields.status') }}
                        </th>
                        <td>
                            {{ $affiliate->status->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.affiliates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
