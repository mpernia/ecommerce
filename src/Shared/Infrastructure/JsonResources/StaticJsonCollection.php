<?php

namespace Ecommerce\Shared\Infrastructure\JsonResources;

class StaticJsonCollection
{
    public static function make(array $data)
    {
        return [
            'data' => $data,
            'links'   => ['self' => config('setting.api_url'), 'doc' => config('setting.docs_url')],
            'jsonapi' => ['version' => config('setting.api_version')],
            'meta' => ['title' => config('setting.app_name')],
        ];
    }
}
