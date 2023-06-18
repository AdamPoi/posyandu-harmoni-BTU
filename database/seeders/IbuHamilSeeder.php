<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IbuHamilSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //  'nama',
    //     'alamat',
    //     'no_telepon',
    //     'usia_kandungan',
    //     'tanggal_hamil',
    //     'tanggal_lahir'
    DB::table('ibu_hamils')->insert([
      ['nama' => 'Fitri', 'alamat' => 'Dinoyo', 'no_telepon' => '0821657309', 'usia_kandungan' => '5', 'tanggal_hamil' => '2023-02-13', 'tanggal_lahir' => '2023-12-13'],
      ['nama' => 'Andini', 'alamat' =>  'Pasuruan', 'no_telepon' => '0821657432', 'usia_kandungan' => '5', 'tanggal_hamil' => '2023-03-08', 'tanggal_lahir' =>  '2023-08-13'],
      ['nama' => 'Ani', 'alamat' =>  'Malang', 'no_telepon' => '0898654913', 'usia_kandungan' => '5', 'tanggal_hamil' => '2022-06-07', 'tanggal_lahir' => '2023-04-03'],
      ['nama' => 'Vina', 'alamat' =>  'Surabaya', 'no_telepon' => '0821589309', 'usia_kandungan' => '5', 'tanggal_hamil' => '2023-02-02', 'tanggal_lahir' =>  '2023-04-03'],
      ['nama' => 'Rani', 'alamat' => 'Jakarta', 'no_telepon' => '0824097432', 'usia_kandungan' => '5', 'tanggal_hamil' => '2022-02-10', 'tanggal_lahir' =>  '2022-06-15'],
      ['nama' => 'Santi', 'alamat' => 'Bandung', 'no_telepon' => '0821655082', 'usia_kandungan' => '7', 'tanggal_hamil' => '2023-02-07', 'tanggal_lahir' =>  '2023-04-13'],
      ['nama' => 'Dita', 'alamat' => 'Palembang', 'no_telepon' => '0087449076', 'usia_kandungan' => '3', 'tanggal_hamil' => '2023-05-11', 'tanggal_lahir' =>  '2023-08-22'],
      ['nama' => 'Siti', 'alamat' => 'Donomulyo', 'no_telepon' => '0855023156', 'usia_kandungan' => '2', 'tanggal_hamil' => '2023-04-18', 'tanggal_lahir' => '2023-08-15'],
      ['nama' => 'Maria', 'alamat' =>  'Kediri', 'no_telepon' => '08516549026', 'usia_kandungan' => '4', 'tanggal_hamil' => '2023-01-04', 'tanggal_lahir' => '2023-04-03'],
      ['nama' => 'Nisa', 'alamat' => 'Kepanjen', 'no_telepon' => '0821640278', 'usia_kandungan' => '5', 'tanggal_hamil' => '2023-03-09', 'tanggal_lahir' => '2023-08-15']
    ]);
  }
}
