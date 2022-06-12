<?php

declare(strict_types=1);

namespace App\Services;


use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use DomainException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function create(RegisterRequest $request)
    {
        $user = User::firstWhere(['email' => strtolower($request->get('email'))]);
        if ($user) throw new DomainException('Користувач з такою електроною адресою вже існує');

        return User::create([
            'username' => $request->get('username'),
            'email' => strtolower($request->get('email')),
            'password' => Hash::make($request->get('password')),
            'user_agent' => request()->userAgent(),
            'user_ip' => request()->ip(),
        ]);
    }

    public function update(EditRequest $request, User $user): void
    {
        $dataUser = $request->all();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $dataUser['image'] = Storage::disk('public')->url($path);
        }

        $user->update($dataUser);
    }

    public function getUsersAdminPaginate()
    {
        return User::sortable(['created_at' => 'desc'])->paginate(5);
    }

    /**
     * @param int $id
     * @return User|null
     */
    public function getUserById(int $id): User|null
    {
        return User::find($id);
    }
}
