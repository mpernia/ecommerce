@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.affiliate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.affiliates.update", [$affiliate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.affiliate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $affiliate->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.affiliate.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $affiliate->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_date">{{ trans('cruds.affiliate.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $affiliate->start_date) }}">
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="budget">{{ trans('cruds.affiliate.fields.budget') }}</label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number" name="budget" id="budget" value="{{ old('budget', $affiliate->budget) }}" step="0.01">
                @if($errors->has('budget'))
                    <span class="text-danger">{{ $errors->first('budget') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.budget_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clients">{{ trans('cruds.affiliate.fields.client') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('advertisers') ? 'is-invalid' : '' }}" name="clients[]" id="clients" multiple>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (in_array($id, old('advertisers', [])) || $affiliate->clients->contains($id)) ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('advertisers'))
                    <span class="text-danger">{{ $errors->first('advertisers') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.advertiser_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.affiliate.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ (old('status_id') ? old('status_id') : $affiliate->status->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliate.fields.status_helper') }}</span>
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
