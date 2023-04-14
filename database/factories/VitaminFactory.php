<?php

namespace Database\Factories;

use App\Models\Vitamin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vitamin>
 */
class VitaminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jenis_vitamin' => fake()->name(),
            'deskripsi' => fake()->realText(),
          ];
    }
}
