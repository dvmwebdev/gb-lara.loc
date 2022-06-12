<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Sortable, HasApiTokens, Notifiable;

    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    public array $sortable = ['email', 'username'];
    protected $table = 'users';
    protected $guarded = [];

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'user_id', 'id');
    }

    public function statusOnline(): string
    {
        return $this->update([
            'status' => 1
        ]);
    }

    public function statusOffline(): string
    {
        return $this->update([
            'status' => 0
        ]);
    }
}
