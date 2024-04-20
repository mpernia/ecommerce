@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.store.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.stores.update", [$store->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.store.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $store->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="advertiser_id">{{ trans('cruds.store.fields.advertiser') }}</label>
                <select class="form-control select2 {{ $errors->has('advertiser') ? 'is-invalid' : '' }}" name="advertiser_id" id="advertiser_id" required>
                    @foreach($advertisers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('advertiser_id') ? old('advertiser_id') : $store->advertiser->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('advertiser'))
                    <span class="text-danger">{{ $errors->first('advertiser') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.advertiser_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.store.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $store->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.store.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $store->start_date) }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budget">{{ trans('cruds.store.fields.budget') }}</label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number" name="budget" id="budget" value="{{ old('budget', $store->budget) }}" step="0.01">
                @if($errors->has('budget'))
                    <span class="text-danger">{{ $errors->first('budget') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.budget_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.store.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $store->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.store.fields.status_helper') }}</span>
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
