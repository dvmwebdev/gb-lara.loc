<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $user_ip
 * @property string $user_browser
 */
class User extends Authenticatable implements MustVerifyEmail
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

    public function countFeedbacksAll(): int
    {
        return $this->feedbacks()->count();
    }

    public function countFeedbacksModerate(): int
    {
        return $this->feedbacks()->where(['moderate' => 0])->count();
    }

    /**
     * @return int
     */
    public function userAll(): int
    {
        return $this->all()->count();
    }

    /**
     * @return int
     */
    public function userBaned(): int
    {
        return $this->where(['is_baned' => 1])->count();
    }
}
