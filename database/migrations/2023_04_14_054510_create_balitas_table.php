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
      $table->id();
      $table->string('nama');
      $table->date('tanggal_lahir');
      $table->string('jenis_kelamin');
      $table->float('berat_badan');
      $table->float('tinggi_badan');
      $table->timestamps();
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
    Schema::dropIfExists('balitas');
  }
};
