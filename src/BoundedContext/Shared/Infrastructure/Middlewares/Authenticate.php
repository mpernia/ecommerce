<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        if (strpos($request->url(), 'backoffice')) {
            $route = route('admin.login.form');
        } else {
            $route = route('frontend.home');
        }
        return $request->expectsJson() ? null : $route;
    }
}
