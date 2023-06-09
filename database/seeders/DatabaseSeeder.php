<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    DB::table('users')->insert([
      'nama' => 'Admin',
      'role' => 'admin',
      'usia' => 13,
      'alamat' => 'malang',
      'email' => 'admin@admin.com',
      'password' => Hash::make('admin12345')
    ]);
    // \App\Models\Jadwal::factory(100)->create();
    // \App\Models\Vitamin::factory(100)->create();
    // \App\Models\IbuHamil::factory(100)->create();
    // \App\Models\Balita::factory(100)->create();
    // \App\Models\Imunisasi::factory(100)->create();
    // \App\Models\Pemeriksaan::factory(100)->create();
    // \App\Models\Penimbangan::factory(100)->create();
  }
}
