<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class FeedbackFactory extends Factory
{

    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 10),
            'content' => $this->faker->realText(),
            'moderate' => random_int(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
