<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\Shared\Infrastructure\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;

    protected string $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
