<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('jadwals', function (Blueprint $table) {
      $table->increments('id_jadwal');
      $table->date('tanggal');
      $table->enum('jenis', ['imunisasi', 'penimbangan', 'pemeriksaan', 'lainnya']);
      $table->string('kegiatan');
      $table->text('deskripsi')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('jadwals');
  }
};
