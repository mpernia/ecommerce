<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (! auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
