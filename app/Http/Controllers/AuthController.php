<?php

namespace App\Http\Controllers;

use App\Http\Requests\{LoginFormRequest, RegisterFormRequest};
use App\Models\{Profile, User};
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        if (Auth::attempt($request->only("email", "password"))) {
            $request->session()->regenerate();
            return redirect('profile');
        }

        return back()->withErrors(['email' => 'information does not match our records']);
    }

    public function register(RegisterFormRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        User::createUser($request->name, $request->email, $request->password);

        Auth::attempt($request->only("email", "password"));
        $request->session()->regenerate();
        Profile::createProfileInfo(Auth::id());

        return redirect('/profile');
    }

    public function logout(): JsonResponse|RedirectResponse
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }

        return new JsonResponse(
            ['error' => 'There is no user logged in!'],
            \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED
        );
    }
}
