@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.knownHost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.known-hosts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.knownHost.fields.id') }}
                        </th>
                        <td>
                            {{ $knownHost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knownHost.fields.ip_address') }}
                        </th>
                        <td>
                            {{ $knownHost->ip_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.knownHost.fields.domain') }}
                        </th>
                        <td>
                            {{ $knownHost->domain }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.known-hosts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection