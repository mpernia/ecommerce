<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreKnownHostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('known_host_create');
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
