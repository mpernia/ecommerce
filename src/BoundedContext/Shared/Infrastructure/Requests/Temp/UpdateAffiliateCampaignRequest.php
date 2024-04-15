<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAffiliateCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('affiliate_campaign_edit');
    }

    public function rules()
    {
        return [];
    }
}
