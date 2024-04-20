<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Requests\Temp;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStoreRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('store_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'advertiser_id' => [
                'required',
                'integer',
            ],
            'start_date' => [
                'date_format:' . config('setting.date_format'),
                'nullable',
            ],
            'budget' => [
                'numeric',
            ],
        ];
    }
}
