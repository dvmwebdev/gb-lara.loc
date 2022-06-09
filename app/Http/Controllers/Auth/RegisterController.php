<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(): View
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    protected function register(RegisterRequest $request): RedirectResponse
    {
        User::create([
            'username' => $request->get('username'),
            'email' => strtolower($request->get('email')),
            'password' => Hash::make($request->get('password')),
            'user_agent' => request()->userAgent(),
            'user_ip' => request()->ip(),
        ]);
        return redirect()->route('login')->with('register', 'qweqweqwewqe');
    }
}
