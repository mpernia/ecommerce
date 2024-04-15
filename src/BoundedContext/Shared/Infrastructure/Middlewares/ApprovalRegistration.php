<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Closure;

class ApprovalRegistration
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (! auth()->user()->approved) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.yourAccountNeedsAdminApproval'));
            }
        }

        return $next($request);
    }
}
