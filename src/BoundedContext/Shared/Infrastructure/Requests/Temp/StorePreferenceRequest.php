<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePreferenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('preference_create');
    }

    public function rules()
    {
        return [];
    }
}
