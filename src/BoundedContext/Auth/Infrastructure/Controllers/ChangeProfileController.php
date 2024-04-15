<?php

namespace Ecommerce\BoundedContext\Auth\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
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

class ChangeProfileController extends Controller
{
    public function edit(): View|Application|FactoryInterface|ViewInterface|ApplicationInterface
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('auth.profile');
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('profile.edit')->with('message', __('global.update_profile_success'));
    }
}
