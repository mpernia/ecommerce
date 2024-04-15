<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLeadRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lead_create');
    }

    public function rules()
    {
        return [
            'affiliate_campaign_id' => [
                'required',
                'integer',
            ],
            'tracking' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
        ];
    }
}
