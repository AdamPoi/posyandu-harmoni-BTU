<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IbuHamil>
 */
class IbuHamilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' =>fake()->name(),
            'alamat'=> fake()->realText(),
            'no_telepon'=> fake()->randonNumber(),
            'usia_kandungan'=>fake()->randomNumber(),
            'tanggal_hamil'=> fake()->datetime(),
            'tanggal_lahir'=>fake()->datetime(),
        ];
    }
}
