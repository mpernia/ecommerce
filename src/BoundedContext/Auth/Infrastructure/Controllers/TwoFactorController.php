<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Notifications\TwoFactorCodeNotification;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\CheckTwoFactorRequest;
use Illuminate\Contracts\Foundation\Application as ApplicationInterface;
use Illuminate\Contracts\View\Factory as FactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class TwoFactorController extends Controller
{
    public function show(): View|Application|FactoryInterface|ViewInterface|ApplicationInterface
    {
        abort_if(auth()->user()->two_factor_code === null,
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        return view('auth.twoFactor');
    }

    public function check(CheckTwoFactorRequest $request): RedirectResponse
    {
        $user = auth()->user();

        if ($request->input('two_factor_code') == $user->two_factor_code) {
            $user->resetTwoFactorCode();

            $route = (Route::has('frontend.home') && ! $user->is_admin) ? 'frontend.home' : 'admin.home';

            return redirect()->route($route);
        }

        return redirect()->back()->withErrors(['two_factor_code' => __('global.two_factor.does_not_match')]);
    }

    public function resend(): RedirectResponse
    {
        abort_if(auth()->user()->two_factor_code === null,
            Response::HTTP_FORBIDDEN,
            '403 Forbidden'
        );

        auth()->user()->notify(new TwoFactorCodeNotification());

        return redirect()->back()->with('message', __('global.two_factor.sent_again'));
    }
}
