<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
  use HasFactory;
  protected $table = 'penimbangans';
  
  protected $fillable = [
    'id_balita',
    'berat_badan',
    'tinggi_badan',
    'tanggal',
  ];
  public function balita()
  {
    return $this->belongsTo(Balita::class, 'id_balita');
  }
}
