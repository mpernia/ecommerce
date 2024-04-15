@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.preference.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.preferences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.preference.fields.id') }}
                        </th>
                        <td>
                            {{ $preference->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.preference.fields.sort_product_by') }}
                        </th>
                        <td>
                            {{ App\Models\Preference::SORT_PRODUCT_BY_SELECT[$preference->sort_product_by] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.preference.fields.notify_method') }}
                        </th>
                        <td>
                            {{ App\Models\Preference::NOTIFY_METHOD_SELECT[$preference->notify_method] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('backoffice.preferences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection