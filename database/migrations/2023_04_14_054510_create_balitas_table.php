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
    Schema::create('balitas', function (Blueprint $table) {
      $table->increments('id_balita');
      $table->unsignedInteger('id_ibu_hamil');
      $table->string('nama');
      $table->string('nama_ayah');
      $table->string('nama_ibu');
      $table->date('tanggal_lahir');
      $table->integer('usia')->nullable();
      $table->string('jenis_kelamin');
      $table->timestamps();

      $table->foreign('id_ibu_hamil')->references('id_ibu_hamil')->on('ibu_hamils')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('balitas');
  }
};
