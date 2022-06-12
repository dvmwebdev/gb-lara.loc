<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return View
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $auth = Auth::attempt(
            $request->only(['email', 'password']),
            $request->filled('remember')
        );

        if ($auth) {
            $request->session()->regenerate();

            if (User::ROLE_USER === auth()->user()->role) return redirect()->intended(route('user.index'));
            if (User::ROLE_ADMIN === auth()->user()->role) return redirect()->intended(route('admin.dashboard.index'));
        }
        throw ValidationException::withMessages(['email' => [trans('auth.failed')]]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('home.index');
    }
}
