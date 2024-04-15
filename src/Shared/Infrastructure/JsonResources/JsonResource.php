<?php

namespace Ecommerce\Shared\Infrastructure\JsonResources;

use Illuminate\Http\Resources\Json\JsonResource as JsonResourceBase;

class JsonResource extends JsonResourceBase
{
    public function additional(array $data): JsonResource|static
    {
        $this->additional = [
            'links'   => ['self' => config('setting.api_url'), 'doc' => config('setting.docs_url')],
            'jsonapi' => ['version' => config('setting.api_version')],
            'meta' => ['title' => config('setting.app_name')],
        ];
        return $this;
    }

    public function toArray($request): array
    {
        $params = method_exists($this->resource, 'routeParameters')
            ? $this->resource->routeParameters()
            : $this->resource->getRouteKey();

        $array = [
            'type' => (string) $this->resource->getType(),
            'id' => (string) $this->resource->getRouteKey(),
            'attributes' => (array) $this->resource->getApiAttributes(),
            'links' => [
                'self' => route($this->resource->getRoute(), $params)
            ],
        ];

        if (!empty($this->resource->relationships())){
            $array['relationships'] = $this->resource->relationships();
        }

        if (!empty($this->resource->included())){
            $array['included'] = $this->resource->included();
        }

        return $array;
    }
}
