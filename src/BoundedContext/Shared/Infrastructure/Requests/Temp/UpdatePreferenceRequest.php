<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePreferenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('preference_edit');
    }

    public function rules()
    {
        return [];
    }
}
