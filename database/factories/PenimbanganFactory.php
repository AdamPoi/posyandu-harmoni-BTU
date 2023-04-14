<?php

namespace Database\Factories;
use App\Models\Balita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penimbangan>
 */
class PenimbanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_balita' => Balita::inRandomOrder()->first()->id_balita,
            'berat_badan' => fake()->randomDigit(),
            'tinggi_badan' => fake()->randomDigit(),
            'tanggal'=> fake()->date(),
        ];
    }
}
