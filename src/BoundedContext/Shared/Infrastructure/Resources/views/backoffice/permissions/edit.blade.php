@extends('layouts.backoffice')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.permission.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("backoffice.permissions.update", [$permission->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.permission.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', $permission->title) }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="key">{{ trans('cruds.permission.fields.key') }}</label>
                    <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key"
                           id="key" value="{{ old('key', $permission->key) }}" required>
                    @if($errors->has('key'))
                        <span class="text-danger">{{ $errors->first('key') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.permission.fields.key_helper') }}</span>
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
