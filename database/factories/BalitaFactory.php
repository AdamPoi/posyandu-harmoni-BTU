<?php

namespace Database\Factories;
use App\Models\IbuHamil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Balita>
 */
class BalitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_ibu_hamil' => IbuHamil::inRandomOrder()->first()->id_ibu_hamil,
            'nama' =>fake()->name(),
            'nama_ayah' =>fake()->name(),
            'nama_ibu' =>fake()->name(),
            'tanggal_lahir'=> fake()->date(),
            'jenis_kelamin' =>fake()->randomElement(['Perempuan', 'Laki-Laki']),
        ];
    }
}
