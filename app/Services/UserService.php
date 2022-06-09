<?php

declare(strict_types=1);

namespace App\Services;


use App\Http\Requests\User\EditRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserService
{
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

    public function getUserById(int $id): Model|Collection|array|User|null
    {
        return User::find($id);
    }
}
