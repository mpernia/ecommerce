<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campaign_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:5',
                'required',
                'unique:campaigns,name,' . request()->route('campaign')->id,
            ],
            'url' => [
                'string',
                'required',
                'unique:campaigns,url,' . request()->route('campaign')->id,
            ],
            'utm_source' => [
                'string',
                'required',
            ],
            'utm_medium' => [
                'required',
            ],
            'utm_campaign' => [
                'string',
                'required',
            ],
            'utm_term' => [
                'string',
                'nullable',
            ],
            'utm_content' => [
                'string',
                'nullable',
            ],
            'persent_per_sale' => [
                'numeric',
                'min:0',
                'max:100',
            ],
            'products.*' => [
                'integer',
            ],
            'products' => [
                'array',
            ],
        ];
    }
}
