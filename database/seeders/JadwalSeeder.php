<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //  'tanggal',
    // 'kegiatan',
    // 'deskripsi',
    DB::table('jadwals')->insert([
      ['tanggal' => '2023-06-15 08:00:00', 'jenis' => 'penimbangan', 'kegiatan' => 'Pemeriksaan Kesehatan Balita', 'deskripsi' => 'Posyandu juga menyediakan pemeriksaan kesehatan rutin bagi balita. Ini meliputi pengukuran berat badan, tinggi badan, dan lingkar kepala, serta pemeriksaan tumbuh kembang, imunisasi, dan pemberian suplemen gizi. Pemeriksaan ini membantu memantau pertumbuhan dan perkembangan balita serta mendeteksi dini masalah kesehatan yang mungkin timbul.'],
      ['tanggal' => '2023-06-06 12:00:00', 'jenis' => 'imunisasi', 'kegiatan' => 'Imunisasi', 'deskripsi' => 'Posyandu merupakan tempat yang penting untuk menyediakan imunisasi kepada ibu hamil, balita, dan keluarga. Imunisasi yang biasanya diberikan di Posyandu meliputi imunisasi dasar, seperti imunisasi DPT (difteri, pertusis, tetanus), polio, hepatitis B, BCG (tuberkulosis), serta imunisasi tambahan seperti imunisasi campak dan rubella.'],
      ['tanggal' => '2023-06-12 09:00:00', 'jenis' => 'pemeriksaan', 'kegiatan' => 'Pemeriksaan Kesehatan Ibu Hamil', 'deskripsi' => 'Posyandu juga menyelenggarakan pemeriksaan rutin bagi Ibu Hamil'],
      ['tanggal' => '2023-06-13 09:00:00', 'jenis' => 'lainnya', 'kegiatan' => 'Pemberian Suplemen dan Makanan Tambahan', 'deskripsi' => 'Posyandu juga memberikan suplemen gizi, seperti tablet zat besi bagi ibu hamil dan sirup vitamin bagi balita. Selain itu, posyandu juga memberikan makanan tambahan berupa makanan bergizi untuk balita, seperti makanan pendamping ASI (MP-ASI), untuk memastikan asupan gizi yang cukup bagi balita.'],
      ['tanggal' => '2023-06-12 09:00:00', 'jenis' => 'lainnya', 'kegiatan' => 'Pengelompokkan Ibu dan Anak', 'deskripsi' => 'Posyandu juga menyelenggarakan pertemuan kelompok ibu hamil dan kelompok balita. Tujuan dari kegiatan ini adalah untuk memberikan dukungan sosial, saling bertukar pengalaman, dan memperoleh pengetahuan tentang kesehatan ibu dan anak.'],
      ['tanggal' => '2023-07-19 12:00:00', 'jenis' => 'lainnya', 'kegiatan' => 'Pemantauan dan Penimbangan Pertumbuhan dan Kesehatan', 'deskripsi' => 'Posyandu memiliki sistem pemantauan pertumbuhan dan kesehatan untuk ibu hamil, balita, dan anggota keluarga lainnya. Data ini digunakan untuk melacak perkembangan dan memonitor keberhasilan program kesehatan yang dilakukan di Posyandu.'],
      ['tanggal' => '2023-08-22 12:00:00', 'jenis' => 'lainnya', 'kegiatan' => 'Konseling dan Edukasi', 'deskripsi' => 'Petugas kesehatan di Posyandu memberikan konseling dan edukasi kepada ibu hamil, orang tua balita, dan anggota keluarga lainnya. Ini mencakup informasi tentang perawatan kehamilan, perawatan bayi dan balita, gizi seimbang, sanitasi, kebersihan, dan praktik kesehatan lainnya.'],
    ]);
  }
}
