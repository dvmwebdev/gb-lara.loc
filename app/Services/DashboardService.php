<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Feedback;
use App\Models\User;

class DashboardService
{
    public function __construct(
        private readonly User     $user,
        private readonly Feedback $feedback
    )
    {
    }

    /**
     * @return int
     */
    public function userAll(): int
    {
        return $this->user->all()->count();
    }

    /**
     * @return int
     */
    public function userBaned(): int
    {
        return $this->user->all()->where(['is_baned' => 1])->count();
    }
}
