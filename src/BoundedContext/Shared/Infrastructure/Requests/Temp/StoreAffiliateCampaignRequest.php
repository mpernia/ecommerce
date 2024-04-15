<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAffiliateCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('affiliate_campaign_create');
    }

    public function rules()
    {
        return [];
    }
}
