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
    Schema::create('imunisasis', function (Blueprint $table) {
      $table->increments('id_imunisasi');
      $table->unsignedInteger('id_balita');
      $table->unsignedInteger('id_vitamin');
      $table->unsignedInteger('id_jadwal')->nullable();
      $table->date('tanggal');
      $table->text('deskripsi')->nullable();
      $table->timestamps();

      $table->foreign('id_balita')->references('id_balita')->on('balitas')->onDelete('cascade');
      $table->foreign('id_vitamin')->references('id_vitamin')->on('vitamins')->onDelete('cascade');
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
    Schema::dropIfExists('imunisasis');
  }
};
