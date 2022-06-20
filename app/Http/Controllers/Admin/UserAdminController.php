<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserAdminController extends Controller
{
    public function __construct(
        private readonly UserService $userService
    )
    {
    }

    public function index(): View
    {
        $users = $this->userService->getUsersAdminPaginate();
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function show(User $user): View
    {
        $user = $this->userService->getUserById($user->id);
        return view('admin.user.show', [
            'user' => $user
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $this->userService->update($request, $user);
        return redirect()->route('admin.user.index');
    }
}
