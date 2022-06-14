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
     * @return array
     */
    public function getData(): array
    {
        $data = [];
        $data['userAll'] = $this->userAll();
        return $data;
    }

    /**
     * @return int
     */
    public function userAll(): int
    {
        return $this->user->all()->count();
    }

    /**
     * @param string $keyName
     * @param int $value
     * @return int
     */
    public function data(string $keyName, int $value): int
    {
        return $this->data[$keyName] = $value;

    }

    /**
     * @return void
     */
    public function userBaned(): void
    {
        $this->data['userBaned'] = $this->user->all()->where(['is_baned' => 1])->count();
    }

    /**
     * @return void
     */
    public function feedbackAll(): void
    {
        $this->data['feedbackAll'] = $this->feedback->all()->count();
    }

    /**
     * @return void
     */
    public function feedbackModerate(): void
    {
        $this->data['feedbackAll'] = $this->feedback->all()->where(['moderate' => 0])->count();
    }
}
