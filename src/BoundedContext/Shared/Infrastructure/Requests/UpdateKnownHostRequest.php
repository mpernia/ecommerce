<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateKnownHostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('known_host_edit');
    }

    public function rules()
    {
        return [
            'ip_address' => [
                'string',
                'required',
            ],
            'domain' => [
                'string',
                'required',
            ],
        ];
    }
}
