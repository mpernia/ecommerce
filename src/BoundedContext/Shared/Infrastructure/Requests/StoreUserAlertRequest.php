<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_alert_create');
    }

    public function rules()
    {
        return [
            'alert_text' => [
                'string',
                'required',
            ],
            'alert_link' => [
                'string',
                'nullable',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'array',
            ],
        ];
    }
}
