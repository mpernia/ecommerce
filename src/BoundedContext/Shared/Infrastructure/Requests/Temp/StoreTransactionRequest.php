<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransactionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaction_create');
    }

    public function rules()
    {
        return [
            'store_id' => [
                'required',
                'integer',
            ],
            'transaction_type_id' => [
                'required',
                'integer',
            ],
            'income_source_id' => [
                'required',
                'integer',
            ],
            'amount' => [
                'required',
            ],
            'currency_id' => [
                'required',
                'integer',
            ],
            'transaction_date' => [
                'required',
                'date_format:' . config('setting.date_format'),
            ],
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
