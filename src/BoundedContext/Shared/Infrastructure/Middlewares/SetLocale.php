<?php

namespace Ecommerce\BoundedContext\Shared\Infrastructure\Middlewares;

use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (request('change_language')) {
            session()->put('language', request('change_language'));
            $language = request('change_language');
        } elseif (session('language')) {
            $language = session('language');
        } elseif (config('setting.primary_language')) {
            $language = config('setting.primary_language');
        }

        if (isset($language)) {
            app()->setLocale($language);
        }

        return $next($request);
    }
}
