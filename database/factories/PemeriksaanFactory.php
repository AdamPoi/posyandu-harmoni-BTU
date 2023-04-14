<?php

namespace Database\Factories;

use App\Models\IbuHamil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemeriksaan>
 */
class PemeriksaanFactory extends Factory
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
      'tanggal' => fake()->date(),
      'catatan' => fake()->realText()
    ];
  }
}
