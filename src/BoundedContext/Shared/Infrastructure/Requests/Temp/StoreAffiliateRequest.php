<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAffiliateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('affiliate_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('setting.date_format'),
                'nullable',
            ],
            'budget' => [
                'numeric',
            ],
            'advertisers.*' => [
                'integer',
            ],
            'advertisers' => [
                'array',
            ],
        ];
    }
}
