<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
  use HasFactory;
  protected $table = 'ibu_hamils';
  protected $primaryKey = 'id_ibu_hamil';

  protected $fillable = [
    'nama',
    'alamat',
    'nama_ibu',
    'no_telepon',
    'usia_kandungan',
    'tanggal_hamil',
    'tanggal_lahir'
  ];

  public function pemeriksaan()
  {
    return $this->belongsTo(Pemeriksaan::class, 'id_ibu_hamil');
  }
}
