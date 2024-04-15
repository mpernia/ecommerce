<?php

namespace Ecommerce\Shared\Infrastructure\JsonResources;

use Illuminate\Http\Resources\Json\ResourceCollection as ResourceCollectionBase;

class JsonCollection extends ResourceCollectionBase
{
    public function toArray($request): array
    {
        return [
            'data' => $this->collection,
            'links'   => ['self' => config('setting.api_url'), 'doc' => config('setting.docs_url')],
            'jsonapi' => ['version' => config('setting.api_version')],
            'meta' => ['title' => config('setting.app_name')],
        ];
    }
}
