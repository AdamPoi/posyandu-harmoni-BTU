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
    Schema::create('penimbangans', function (Blueprint $table) {
      $table->increments('id_penimbangan');
      $table->unsignedInteger('id_balita');
      $table->float('berat_badan');
      $table->float('tinggi_badan');
      $table->float('lingkar_kepala');
      $table->date('tanggal');
      $table->unsignedInteger('id_jadwal')->nullable();
      $table->timestamps();
      $table->foreign('id_balita')->references('id_balita')->on('balitas')->onDelete('cascade');
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
    Schema::dropIfExists('penimbangans');
  }
};
