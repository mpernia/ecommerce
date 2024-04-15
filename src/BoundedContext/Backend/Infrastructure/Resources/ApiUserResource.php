<?php

namespace Ecommerce\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiUserResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
