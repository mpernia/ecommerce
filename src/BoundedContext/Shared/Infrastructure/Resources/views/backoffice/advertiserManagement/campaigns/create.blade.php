@extends('layouts.backoffice')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("backoffice.campaigns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.campaign.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_active" value="0">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">{{ trans('cruds.campaign.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.is_active_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.campaign.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="utm_source">{{ trans('cruds.campaign.fields.utm_source') }}</label>
                <input class="form-control {{ $errors->has('utm_source') ? 'is-invalid' : '' }}" type="text" name="utm_source" id="utm_source" value="{{ old('utm_source', '') }}" required>
                @if($errors->has('utm_source'))
                    <span class="text-danger">{{ $errors->first('utm_source') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.utm_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.campaign.fields.utm_medium') }}</label>
                <select class="form-control {{ $errors->has('utm_medium') ? 'is-invalid' : '' }}" name="utm_medium" id="utm_medium" required>
                    <option value disabled {{ old('utm_medium', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($utmMedium as $key => $label)
                        <option value="{{ $key }}" {{ old('utm_medium', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('utm_medium'))
                    <span class="text-danger">{{ $errors->first('utm_medium') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.utm_medium_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="utm_campaign">{{ trans('cruds.campaign.fields.utm_campaign') }}</label>
                <input class="form-control {{ $errors->has('utm_campaign') ? 'is-invalid' : '' }}" type="text" name="utm_campaign" id="utm_campaign" value="{{ old('utm_campaign', '') }}" required>
                @if($errors->has('utm_campaign'))
                    <span class="text-danger">{{ $errors->first('utm_campaign') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.utm_campaign_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utm_term">{{ trans('cruds.campaign.fields.utm_term') }}</label>
                <input class="form-control {{ $errors->has('utm_term') ? 'is-invalid' : '' }}" type="text" name="utm_term" id="utm_term" value="{{ old('utm_term', '') }}">
                @if($errors->has('utm_term'))
                    <span class="text-danger">{{ $errors->first('utm_term') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.utm_term_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="utm_content">{{ trans('cruds.campaign.fields.utm_content') }}</label>
                <input class="form-control {{ $errors->has('utm_content') ? 'is-invalid' : '' }}" type="text" name="utm_content" id="utm_content" value="{{ old('utm_content', '') }}">
                @if($errors->has('utm_content'))
                    <span class="text-danger">{{ $errors->first('utm_content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.utm_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_per_clic">{{ trans('cruds.campaign.fields.pay_per_clic') }}</label>
                <input class="form-control {{ $errors->has('pay_per_clic') ? 'is-invalid' : '' }}" type="number" name="pay_per_clic" id="pay_per_clic" value="{{ old('pay_per_clic', '0') }}" step="0.01">
                @if($errors->has('pay_per_clic'))
                    <span class="text-danger">{{ $errors->first('pay_per_clic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.pay_per_clic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost_per_lead">{{ trans('cruds.campaign.fields.cost_per_lead') }}</label>
                <input class="form-control {{ $errors->has('cost_per_lead') ? 'is-invalid' : '' }}" type="number" name="cost_per_lead" id="cost_per_lead" value="{{ old('cost_per_lead', '0') }}" step="0.01">
                @if($errors->has('cost_per_lead'))
                    <span class="text-danger">{{ $errors->first('cost_per_lead') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.cost_per_lead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost_per_acquisition">{{ trans('cruds.campaign.fields.cost_per_acquisition') }}</label>
                <input class="form-control {{ $errors->has('cost_per_acquisition') ? 'is-invalid' : '' }}" type="number" name="cost_per_acquisition" id="cost_per_acquisition" value="{{ old('cost_per_acquisition', '0') }}" step="0.01">
                @if($errors->has('cost_per_acquisition'))
                    <span class="text-danger">{{ $errors->first('cost_per_acquisition') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.cost_per_acquisition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cost_per_clic">{{ trans('cruds.campaign.fields.cost_per_clic') }}</label>
                <input class="form-control {{ $errors->has('cost_per_clic') ? 'is-invalid' : '' }}" type="number" name="cost_per_clic" id="cost_per_clic" value="{{ old('cost_per_clic', '0') }}" step="0.01">
                @if($errors->has('cost_per_clic'))
                    <span class="text-danger">{{ $errors->first('cost_per_clic') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.cost_per_clic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="persent_per_sale">{{ trans('cruds.campaign.fields.persent_per_sale') }}</label>
                <input class="form-control {{ $errors->has('persent_per_sale') ? 'is-invalid' : '' }}" type="number" name="persent_per_sale" id="persent_per_sale" value="{{ old('persent_per_sale', '0') }}" step="0.01" max="100">
                @if($errors->has('persent_per_sale'))
                    <span class="text-danger">{{ $errors->first('persent_per_sale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.persent_per_sale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="products">{{ trans('cruds.campaign.fields.product') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('products') ? 'is-invalid' : '' }}" name="products[]" id="products" multiple>
                    @foreach($products as $id => $product)
                        <option value="{{ $id }}" {{ in_array($id, old('products', [])) ? 'selected' : '' }}>{{ $product }}</option>
                    @endforeach
                </select>
                @if($errors->has('products'))
                    <span class="text-danger">{{ $errors->first('products') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.product_helper') }}</span>
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
