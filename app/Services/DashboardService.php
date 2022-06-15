<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Feedback;
use App\Models\User;

class DashboardService
{

    /**
     * @var array
     */
    public array $dataAmount = [];

    public function __construct(
        private readonly User     $user,
        private readonly Feedback $feedback
    )
    {
        $this->dataAmountInit();
    }

    /**
     * @return void
     */
    public function dataAmountInit(): void
    {
        $this->setDataAmount('userAll', $this->user->userAll());
        $this->setDataAmount('userBaned', $this->user->userBaned());
        $this->setDataAmount('feedbackAll', $this->feedback->feedbackAll());
        $this->setDataAmount('feedbackModerate', $this->feedback->feedbackModerate());
    }

    /**
     * @return array
     */
    public function getDataAmount(): array
    {
        return $this->dataAmount;
    }

    /**
     * @param string $keyName
     * @param int $value
     * @return void
     */
    public function setDataAmount(string $keyName, int $value): void
    {
        $this->dataAmount[$keyName] = $value;
    }


}
