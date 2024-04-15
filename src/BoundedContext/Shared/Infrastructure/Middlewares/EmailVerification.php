<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Closure;

class EmailVerification
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (! auth()->user()->verified) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.verifyYourEmail'));
            }
        }

        return $next($request);
    }
}
