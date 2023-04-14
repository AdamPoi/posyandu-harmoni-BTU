<?php

namespace Database\Factories;
use App\Models\Balita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imunisasi>
 */
class ImunisasiFactory extends Factory
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
            'jenis_imunisasi' =>fake()->name(),
            'tanggal'=> fake()->date(),
            'deskripsi'=> fake()->realText(),
        ];
    }
}
