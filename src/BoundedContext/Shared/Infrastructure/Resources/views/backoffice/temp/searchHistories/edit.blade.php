@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.searchHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.search-histories.update", [$searchHistory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ $searchHistory->is_active || old('is_active', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.searchHistory.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.searchHistory.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="counter">{{ trans('cruds.searchHistory.fields.counter') }}</label>
                <input class="form-control {{ $errors->has('counter') ? 'is-invalid' : '' }}" type="number" name="counter" id="counter" value="{{ old('counter', $searchHistory->counter) }}" step="1" required>
                @if($errors->has('counter'))
                    <span class="text-danger">{{ $errors->first('counter') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.searchHistory.fields.counter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_date_at">{{ trans('cruds.searchHistory.fields.last_date_at') }}</label>
                <input class="form-control datetime {{ $errors->has('last_date_at') ? 'is-invalid' : '' }}" type="text" name="last_date_at" id="last_date_at" value="{{ old('last_date_at', $searchHistory->last_date_at) }}" required>
                @if($errors->has('last_date_at'))
                    <span class="text-danger">{{ $errors->first('last_date_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.searchHistory.fields.last_date_at_helper') }}</span>
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