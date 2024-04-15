<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFavoriteProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('favorite_product_edit');
    }

    public function rules()
    {
        return [
            'price' => [
                'required',
            ],
            'price_target' => [
                'required',
            ],
        ];
    }
}
