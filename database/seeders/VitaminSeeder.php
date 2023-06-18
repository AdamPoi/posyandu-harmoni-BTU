<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VitaminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //  'jenis_vitamin',
    // 'deskripsi',
    DB::table('vitamins')->insert([
      ['jenis_vitamin' => 'Vitamin D', 'deskripsi' => 'Vitamin D membantu dalam penyerapan kalsium dan fosfor yang penting untuk pertumbuhan tulang dan gigi yang sehat. Vitamin D dapat diberikan dalam bentuk tetes minyak yang mudah diteteskan ke dalam mulut balita.'],
      ['jenis_vitamin' => 'Vitamin C', 'deskripsi' => 'Vitamin C berperan dalam meningkatkan kekebalan tubuh, penyembuhan luka, dan penyerapan zat besi. Biasanya, vitamin C diberikan dalam bentuk sirup yang disesuaikan dengan usia balita.'],
      ['jenis_vitamin' => 'Multivitamin', 'deskripsi' => 'Beberapa Posyandu juga memberikan suplemen multivitamin yang mengandung berbagai jenis vitamin dan mineral penting. Suplemen ini dirancang khusus untuk memenuhi kebutuhan gizi yang diperlukan untuk pertumbuhan dan perkembangan balita.'],
      ['jenis_vitamin' => 'Vitamin A', 'deskripsi' => 'Vitamin A penting untuk pertumbuhan dan perkembangan balita, serta menjaga kesehatan mata dan sistem kekebalan tubuh. Suplemen vitamin A sering diberikan dalam bentuk kapsul minyak, dan dosisnya disesuaikan dengan usia balita.'],
      ['jenis_vitamin' => 'Vitamin K', 'deskripsi' => 'Vitamin K penting untuk pembekuan darah yang normal. Pemberian vitamin K sering dilakukan pada bayi baru lahir, tetapi dalam beberapa kasus, suplemen vitamin K juga dapat diberikan kepada balita yang membutuhkannya.'],
    ]);
  }
}
