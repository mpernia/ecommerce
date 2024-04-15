@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.preference.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.preferences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.preference.fields.sort_product_by') }}</label>
                <select class="form-control {{ $errors->has('sort_product_by') ? 'is-invalid' : '' }}" name="sort_product_by" id="sort_product_by">
                    <option value disabled {{ old('sort_product_by', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Preference::SORT_PRODUCT_BY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('sort_product_by', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('sort_product_by'))
                    <span class="text-danger">{{ $errors->first('sort_product_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.preference.fields.sort_product_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.preference.fields.notify_method') }}</label>
                <select class="form-control {{ $errors->has('notify_method') ? 'is-invalid' : '' }}" name="notify_method" id="notify_method">
                    <option value disabled {{ old('notify_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Preference::NOTIFY_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('notify_method', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('notify_method'))
                    <span class="text-danger">{{ $errors->first('notify_method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.preference.fields.notify_method_helper') }}</span>
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