<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImunisasiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //     'id_balita',
    // 'jenis_imunisasi',
    // 'tanggal',
    // 'deskripsi',
    DB::table('imunisasis')->insert([
      ['id_balita' => 4, 'id_vitamin' => 1, 'tanggal' => '2023-06-07', 'deskripsi' => 'Diberikan dalam beberapa dosis, dimulai sejak bayi baru lahir. Vaksin ini melindungi terhadap infeksi virus hepatitis B yang dapat menyebabkan kerusakan hati.'],
      ['id_balita' => 7, 'id_vitamin' => 1, 'tanggal' => '2023-06-12', 'deskripsi' => 'Diberikan dalam beberapa dosis, dimulai sejak bayi baru lahir. Vaksin ini melindungi terhadap polio, penyakit yang dapat menyebabkan kelumpuhan dan bahkan kematian.'],
      ['id_balita' => 10, 'id_vitamin' => 3, 'tanggal' => '2023-01-18', 'deskripsi' => 'Diberikan dalam beberapa dosis, dimulai sejak usia 2 bulan. Vaksin ini melindungi terhadap infeksi pneumokokus yang dapat menyebabkan pneumonia, meningitis, dan infeksi lainnya.'],
      [
        'id_balita' => 5, 'id_vitamin' => 4, 'tanggal' => '2023-06-13', 'deskripsi' => 'Diberikan dalam beberapa dosis, dimulai sejak usia 2 bulan. Vaksin ini melindungi terhadap penyakit difteri, pertusis (batuk rejan), dan tetanus (kencing tikus).'
      ],
      [
        'id_balita' => 11, 'id_vitamin' => 2, 'tanggal' => '2023-03-10', 'deskripsi' => 'Diberikan dalam beberapa dosis, umumnya dimulai sekitar usia 12-15 bulan. Vaksin ini melindungi terhadap campak, gondong (paparan), dan rubella (campak Jerman).'
      ],
    ]);
  }
}
