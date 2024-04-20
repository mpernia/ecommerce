@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.lead.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.leads.update", [$lead->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="affiliate_campaign_id">{{ trans('cruds.lead.fields.affiliate_campaign') }}</label>
                <select class="form-control select2 {{ $errors->has('affiliate_campaign') ? 'is-invalid' : '' }}" name="affiliate_campaign_id" id="affiliate_campaign_id" required>
                    @foreach($affiliate_campaigns as $id => $entry)
                        <option value="{{ $id }}" {{ (old('affiliate_campaign_id') ? old('affiliate_campaign_id') : $lead->affiliate_campaign->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('affiliate_campaign'))
                    <span class="text-danger">{{ $errors->first('affiliate_campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.affiliate_campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tracking">{{ trans('cruds.lead.fields.tracking') }}</label>
                <input class="form-control {{ $errors->has('tracking') ? 'is-invalid' : '' }}" type="text" name="tracking" id="tracking" value="{{ old('tracking', $lead->tracking) }}" required>
                @if($errors->has('tracking'))
                    <span class="text-danger">{{ $errors->first('tracking') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.tracking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.lead.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', $lead->mobile) }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.mobile_helper') }}</span>
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