@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.knownHost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('backoffice.known-hosts.update', [$knownHost->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="ip_address">{{ trans('cruds.knownHost.fields.ip_address') }}</label>
                <input class="form-control {{ $errors->has('ip_address') ? 'is-invalid' : '' }}" type="text" name="ip_address" id="ip_address" value="{{ old('ip_address', $knownHost->ip_address) }}" required>
                @if($errors->has('ip_address'))
                    <span class="text-danger">{{ $errors->first('ip_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.knownHost.fields.ip_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="domain">{{ trans('cruds.knownHost.fields.domain') }}</label>
                <input class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}" type="text" name="domain" id="domain" value="{{ old('domain', $knownHost->domain) }}" required>
                @if($errors->has('domain'))
                    <span class="text-danger">{{ $errors->first('domain') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.knownHost.fields.domain_helper') }}</span>
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
