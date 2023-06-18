<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'nama' => 'Admin',
        'role' => 'admin',
        'usia' => 25,
        'alamat' => 'malang',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin12345')
      ],
      [
        'nama' => 'yeye',
        'role' => 'admin',
        'usia' => 18,
        'alamat' => 'malang',
        'email' => 'yeye@gmail.com',
        'password' => Hash::make('yeye12345')
      ],
    ]);
  }
}
