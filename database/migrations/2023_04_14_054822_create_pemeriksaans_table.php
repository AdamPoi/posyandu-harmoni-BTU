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
    Schema::create('pemeriksaans', function (Blueprint $table) {
      $table->increments('id_pemeriksaan');
      $table->unsignedInteger('id_ibu_hamil');
      $table->unsignedInteger('id_jadwal')->nullable();

      $table->date('tanggal');
      $table->text('catatan')->nullable();
      $table->timestamps();

      $table->foreign('id_ibu_hamil')->references('id_ibu_hamil')->on('ibu_hamils')->onDelete('cascade');
      $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwals')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('pemeriksaans');
  }
};
