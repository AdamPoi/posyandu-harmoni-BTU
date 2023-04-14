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
    Schema::create('ibu_hamils', function (Blueprint $table) {
      $table->increments('id_ibu_hamil');
      $table->string('nama');
      $table->string('alamat');
      $table->string('no_telepon')->nullable();
      $table->string('usia_kandungan')->nullable();
      $table->date('tanggal_hamil')->nullable();
      $table->date('tanggal_lahir')->nullable();
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
    Schema::dropIfExists('ibu_hamils');
  }
};
