<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Balita;
class Imunisasi extends Model
{
  use HasFactory;
  protected $table = 'imunisasis';

  protected $fillable = [
    'id_balita',
    'jenis_imunisasi',
    'tanggal',
    'deskripsi',
  ];
  public function balita()
  {
    return $this->belongsTo(Balita::class, 'id_balita');
  }
}
