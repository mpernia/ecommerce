<?php

namespace Ecommerce\BoundedContext\Backend\Infrastructure\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KnownHostResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
