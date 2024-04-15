<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAffiliateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('affiliate_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
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
