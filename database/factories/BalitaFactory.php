<?php

namespace Database\Factories;
<<<<<<< HEAD
=======

use App\Models\Balita;
>>>>>>> 6a0f83faf44492609b61e2062d047b4d1e067c61
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
<<<<<<< HEAD
            'nama' =>fake()->name(),
            'nama_ayah' =>fake()->name(),
            'nama_ibu' =>fake()->name(),
            'tanggal_lahir'=> fake()->date(),
            'jenis_kelamin' =>fake()->randomElement(['Perempuan', 'Laki-Laki']),
=======
            'nama' => fake()->name(),
            'nama_ayah' => fake()->name(),
            'nama_ibu' => fake()->name(),
            'tanggal_lahir' => fake()->date(),
            'jenis_kelamin' => fake()->randomElement(['L', 'P'])
>>>>>>> 6a0f83faf44492609b61e2062d047b4d1e067c61
        ];
    }
}
