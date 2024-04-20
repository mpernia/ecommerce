<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('profile_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'first_surname' => [
                'string',
                'nullable',
            ],
            'second_surname' => [
                'string',
                'nullable',
            ],
            'birthday' => [
                'date_format:' . config('setting.date_format'),
                'nullable',
            ],
            'mobile' => [
                'string',
                'nullable',
            ],
        ];
    }
}
