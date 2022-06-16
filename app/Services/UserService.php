<?php

declare(strict_types=1);

namespace App\Services;


use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\EditRequest;
use App\Models\User;
use DomainException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @param RegisterRequest $request
     * @return Model|User
     */
    public function create(RegisterRequest $request): Model|User
    {
        $user = User::firstWhere(['email' => Str::lower($request->get('email'))]);
        if ($user) throw new DomainException('Користувач з такою електронною адресою вже існує');

        return User::create([
            'username' => $request->get('username'),
            'email' => strtolower($request->get('email')),
            'password' => Hash::make($request->get('password')),
            'user_agent' => request()->userAgent(),
            'user_ip' => request()->ip(),
        ]);
    }

    /**
     * @param EditRequest $request
     * @param User $user
     * @return User
     */
    public function update(EditRequest $request, User $user): User
    {
        $dataUser = $request->all();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $path = $file->store('images', 'public');
            $dataUser['image'] = Storage::disk('public')->url($path);
        }

        $user->update($dataUser);
        return $user;
    }

    public function getUsersAdminPaginate(): LengthAwarePaginator
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
