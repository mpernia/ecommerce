<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Carbon\Carbon;
use Closure;

class TwoFactorMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->two_factor_code) {
            if (Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $user->two_factor_expires_at)->lt(now())) {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')->with('message', __('global.two_factor.expired'));
            }

            if (! $request->is('two-factor*')) {
                return redirect()->route('twoFactor.show');
            }
        }

        return $next($request);
    }
}
