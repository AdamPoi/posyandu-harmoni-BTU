<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalitaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // 'id_ibu_hamil',
    // 'nama',
    // 'nama_ayah',
    // 'tanggal_lahir'
    // 'usia',
    // 'jenis_kelamin',
    DB::table('balitas')->insert([
      ['nama_ibu' => 'Citra', 'nama' => 'Budi', 'nama_ayah' => 'Dodo', 'tanggal_lahir' => '2022-02-09', 'usia' => 4, 'jenis_kelamin' => 'L'],
      ['nama_ibu' => 'Citra', 'nama' => 'Sabilar', 'nama_ayah' => 'Fikri', 'tanggal_lahir' => '2023-03-08', 'usia' => 5, 'jenis_kelamin' => 'L'],
      ['nama_ibu' => 'Citra', 'nama' => 'Dani', 'nama_ayah' => 'Sutono', 'tanggal_lahir' => '2023-03-17', 'usia' => 2, 'jenis_kelamin' => 'L'],
      ['nama_ibu' => 'Citra', 'nama' => 'Citra', 'nama_ayah' => 'Vito', 'tanggal_lahir' => '2023-03-11', 'usia' => 6, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Ina', 'nama_ayah' => 'Dito', 'tanggal_lahir' => '2023-04-10', 'usia' => 5, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Safitri', 'nama_ayah' => 'Andi', 'tanggal_lahir' => '2023-04-14', 'usia' => 4, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Heni', 'nama_ayah' => 'Riko', 'tanggal_lahir' => '2023-03-09', 'usia' => 4, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Salim', 'nama_ayah' => 'Gio', 'tanggal_lahir' => '2023-03-10', 'usia' => 5, 'jenis_kelamin' => 'L'],
      ['nama_ibu' => 'Citra', 'nama' => 'Rina', 'nama_ayah' => 'Andi Mahito', 'tanggal_lahir' => '2023-08-18', 'usia' => 3, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Salma', 'nama_ayah' => 'Supriyono', 'tanggal_lahir' => '2023-05-17', 'usia' => 7, 'jenis_kelamin' => 'P'],
      ['nama_ibu' => 'Citra', 'nama' => 'Putri', 'nama_ayah' => 'Sutono', 'tanggal_lahir' => '2023-03-11', 'usia' => 4, 'jenis_kelamin' => 'P'],
    ]);
  }
}
