<?php

namespace Ecommerce\BoundedContext\Backend\Infrastructure\Middlewares;

use Closure;
use Ecommerce\BoundedContext\Backend\Infrastructure\Traits\IpPermissions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WhiteList
{
    use IpPermissions;

    public function handle(Request $request, Closure $next)
    {
        if (!$this->authIpAddress()){
            return response()->json(
                [
                    'errors' => [
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'title'  => 'Validated IP Address',
                        'detail' => 'IP Address is not allowed.'
                    ],
                    'links' => [
                        'self' => config('setting.api_url'),
                        'doc' => config('setting.docs_url')
                    ],
                    'jsonapi' => ['version' => config('setting.api_version')],
                    'meta' => ['title' => config('setting.app_name')]
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }
        return $next($request);
    }
}
