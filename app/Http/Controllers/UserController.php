<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\EditRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{

    public function __construct(
        private readonly UserService $userService,
    )
    {
    }

    public function index(): Renderable
    {
        return view('user.index', [
            'user' => auth()->user()
        ]);
    }

    public function edit(User $user): Renderable
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $this->userService->update($request, $user);
        return redirect()->route('user.index');
    }

}
