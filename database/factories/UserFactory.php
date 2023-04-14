<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'umur' => fake()->randomDigit(),
            'alamat' => fake()->realText(),
            'role' => fake()->randomElement(['admin', 'owner']),
            'email' => fake()->safeEmail(),
            'password' => Hash::make('password')
          ];
    }
}
