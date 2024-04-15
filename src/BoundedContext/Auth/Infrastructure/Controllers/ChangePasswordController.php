<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\UpdatePasswordRequest;
use Ecommerce\BoundedContext\Shared\Infrastructure\Requests\UpdateProfileRequest;
use Illuminate\Contracts\Foundation\Application as ApplicationInterface;
use Illuminate\Contracts\View\Factory as FactoryInterface;
use Illuminate\Contracts\View\View as ViewInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit(): View|Application|FactoryInterface|ViewInterface|ApplicationInterface
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.passwords.edit');
    }

    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function destroy(): RedirectResponse
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
