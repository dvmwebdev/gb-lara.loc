<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;


class FeedbackFactory extends Factory
{

    /**
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 10),
            'content' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(150, 150, 'feedback', true),
            'moderate' => random_int(0, 1),
            'created_at' => $this->faker->dateTimeBetween('-3 years'),
        ];
    }
}
