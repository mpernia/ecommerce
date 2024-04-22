@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.affiliateCampaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.affiliate-campaigns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.affiliateCampaign.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliateCampaign.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="affiliate_id">{{ trans('cruds.affiliateCampaign.fields.affiliate') }}</label>
                <select class="form-control select2 {{ $errors->has('affiliate') ? 'is-invalid' : '' }}" name="affiliate_id" id="affiliate_id">
                    @foreach($affiliates as $id => $entry)
                        <option value="{{ $id }}" {{ old('affiliate_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('affiliate'))
                    <span class="text-danger">{{ $errors->first('affiliate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliateCampaign.fields.affiliate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="campaign_id">{{ trans('cruds.affiliateCampaign.fields.campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('campaign') ? 'is-invalid' : '' }}" name="campaign_id" id="campaign_id">
                    @foreach($campaigns as $id => $entry)
                        <option value="{{ $id }}" {{ old('campaign_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('campaign'))
                    <span class="text-danger">{{ $errors->first('campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.affiliateCampaign.fields.campaign_helper') }}</span>
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