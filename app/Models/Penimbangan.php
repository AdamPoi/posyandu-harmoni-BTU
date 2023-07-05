<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
  use HasFactory;
  protected $table = 'penimbangans';
  protected $primaryKey = 'id_penimbangan';

  protected $fillable = [
    'id_balita',
    'id_jadwal',
    'berat_badan',
    'tinggi_badan',
    'lingkar_kepala',
    'tanggal',
  ];
  public function balita()
  {
    return $this->belongsTo(Balita::class, 'id_balita');
  }
  public function ibuHamil()
  {
    return $this->belongsTo(IbuHamil::class, 'id_ibu_hamil');
  }
  public function jadwal()
  {
    return $this->belongsTo(Jadwal::class, 'id_jadwal');
  }
}
