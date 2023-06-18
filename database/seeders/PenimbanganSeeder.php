<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenimbanganSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //    'id_balita',
    // 'berat_badan',
    // 'tinggi_badan',
    // 'lingkar_kepala',
    // 'tanggal',
    DB::table('penimbangans')->insert([
      ['id_balita' => 6, 'berat_badan' => 20.00, 'tinggi_badan' => 80.00, 'lingkar_kepala' => 30.00, 'tanggal' => '2023-06-19'],
      ['id_balita' => 2, 'berat_badan' => 10.00, 'tinggi_badan' => 73.00, 'lingkar_kepala' => 25.00, 'tanggal' => '2023-03-10'],
      ['id_balita' => 9, 'berat_badan' => 36.00, 'tinggi_badan' => 68.00, 'lingkar_kepala' => 36.00, 'tanggal' => '2023-02-09'],
      ['id_balita' => 1, 'berat_badan' => 48.00, 'tinggi_badan' => 78.00, 'lingkar_kepala' => 27.00, 'tanggal' => '2023-06-05'],
      ['id_balita' => 10, 'berat_badan' => 37.00, 'tinggi_badan' => 72.00, 'lingkar_kepala' => 36.00, 'tanggal' => '2023-05-22'],
    ]);
  }
}
