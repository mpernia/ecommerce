<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSearchHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('search_history_create');
    }

    public function rules()
    {
        return [
            'is_active' => [
                'required',
            ],
            'counter' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'last_date_at' => [
                'required',
                'date_format:' . config('setting.date_format') . ' ' . config('setting.time_format'),
            ],
        ];
    }
}
