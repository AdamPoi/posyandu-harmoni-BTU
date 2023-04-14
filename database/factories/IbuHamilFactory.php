<?php

namespace Database\Factories;

use App\Models\IbuHamil;

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
      'nama' => fake()->name(),
      'alamat' => fake()->address(),
      'no_telepon' => fake()->phoneNumber(),
      'usia_kandungan' => fake()->randomDigit(),
      'tanggal_hamil' => fake()->date(),
      'tanggal_lahir' => fake()->date()
    ];
  }
}
