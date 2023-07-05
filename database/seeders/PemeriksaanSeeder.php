<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemeriksaanSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // 'id_ibu_hamil',
    // 'tanggal',
    // 'catatan'
    DB::table('pemeriksaans')->insert([
      ['id_ibu_hamil' => 6, 'id_jadwal' => 3, 'tanggal' => '2023-02-16', 'catatan' => 'Pengukuran Berat Badan: Ibu hamil akan ditimbang menggunakan timbangan yang sesuai. Pengukuran berat badan ini bertujuan untuk memantau pertambahan berat badan ibu hamil, yang penting untuk menilai pertumbuhan janin dan kesehatan ibu.'],
      ['id_ibu_hamil' => 5, 'id_jadwal' => 3, 'tanggal' => '2023-02-02', 'catatan' => 'Pemeriksaan Tekanan Darah: Tekanan darah ibu hamil akan diukur menggunakan sphygmomanometer atau alat pengukur tekanan darah. Pemeriksaan tekanan darah dilakukan untuk memantau tekanan darah ibu hamil, yang bisa memberi petunjuk tentang risiko komplikasi seperti preeklampsia.'],
      ['id_ibu_hamil' => 8, 'id_jadwal' => 3, 'tanggal' => '2023-06-06', 'catatan' => 'Pendengaran Detak Jantung Janin: Dokter atau petugas kesehatan akan menggunakan stetoskop atau alat doppler untuk mendengarkan detak jantung janin. Ini membantu memantau kesehatan janin dan memastikan bahwa pertumbuhan janin berjalan dengan baik.'],
      ['id_ibu_hamil' => 3, 'id_jadwal' => 3, 'tanggal' => '2023-06-07', 'catatan' => 'Pemberian Suplemen dan Imunisasi: Jika diperlukan, ibu hamil akan diberikan suplemen seperti zat besi atau asam folat. Selain itu, jika ada program imunisasi khusus untuk ibu hamil, seperti imunisasi tetanus toksoid, itu juga dapat diberikan.'],
      ['id_ibu_hamil' => 8, 'id_jadwal' => 3, 'tanggal' => '2023-04-14', 'catatan' => 'Pemeriksaan Urine: Sampel urine ibu hamil akan diperiksa untuk mendeteksi adanya protein, glukosa, atau infeksi saluran kemih. Pemeriksaan urine ini penting untuk menilai kesehatan ginjal dan mengidentifikasi masalah potensial.'],
    ]);
  }
}
