@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.apiUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.api-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.id') }}
                        </th>
                        <td>
                            {{ $apiUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.slug') }}
                        </th>
                        <td>
                            {{ $apiUser->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.name') }}
                        </th>
                        <td>
                            {{ $apiUser->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.email') }}
                        </th>
                        <td>
                            {{ $apiUser->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $apiUser->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.last_login_at') }}
                        </th>
                        <td>
                            {{ $apiUser->last_login_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.apiUser.fields.roles') }}
                        </th>
                        <td>
                            @foreach($apiUser->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.api-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection