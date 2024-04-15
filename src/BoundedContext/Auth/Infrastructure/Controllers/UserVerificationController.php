<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Ecommerce\BoundedContext\Shared\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Http\RedirectResponse;

class UserVerificationController extends Controller
{
    public function approve($token): RedirectResponse
    {
        $user = User::where('verification_token', $token)->first();
        abort_if(! $user, 404);

        $user->verified = 1;
        $user->verified_at = Carbon::now()->format(config('setting.date_format') . ' ' . config('setting.time_format'));
        $user->verification_token = null;
        $user->save();

        return redirect()->route('login')->with('message', trans('global.emailVerificationSuccess'));
    }
}
