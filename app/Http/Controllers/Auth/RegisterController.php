<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\UserService;
use DomainException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    use RegistersUsers;
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
     * @param UserService $userService
     * @return RedirectResponse
     */
    protected function register(RegisterRequest $request, UserService $userService): RedirectResponse
    {
        try {
            $userService->create($request);
            return redirect()->route('login')->with('success', 'Створення акаунту пройшло успішно');
        } catch (DomainException $exception) {
            return redirect()->back()->with('danger', $exception->getMessage());
        }
    }
}
