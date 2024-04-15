<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Notifications\TwoFactorCodeNotification;
use Ecommerce\Shared\Infrastructure\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(): string
    {
        if (auth()->user()->is_admin) {
            return '/backoffice';
        }
        return '/home';
    }

protected function authenticated(Request $request, $user): void
{
    if ($user->two_factor) {
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCodeNotification());
    }
}
}
