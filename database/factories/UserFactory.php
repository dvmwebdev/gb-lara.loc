<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{

    public function definition(): array
    {
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('user123'),
            'user_agent' => $this->faker->userAgent(),
            'user_ip' => $this->faker->localIpv4(),
            'remember_token' => Str::random(10),
        ];
    }

}
