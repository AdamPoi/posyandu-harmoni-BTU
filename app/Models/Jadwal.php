<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
  use HasFactory;

  protected $table = 'jadwals';
  protected $primaryKey = 'id_jadwal';

  protected $fillable = [
    'tanggal',
    'kegiatan',
    'deskripsi',
    'jenis',
  ];
  public function penimbangan()
  {
    return $this->hasMany(Penimbangan::class, 'id_jadwal');
  }
  public function imunisasi()
  {
    return $this->hasMany(Imunisasi::class, 'id_jadwal');
  }
  public function pemeriksaan()
  {
    return $this->hasMany(Pemeriksaan::class, 'id_jadwal');
  }
}
