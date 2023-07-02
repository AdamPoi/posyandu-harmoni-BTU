<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Balita;

class Imunisasi extends Model
{
  use HasFactory;
  protected $table = 'imunisasis';
  protected $primaryKey = 'id_imunisasi';


  protected $fillable = [
    'id_balita',
    'id_vitamin',
    'tanggal',
    'deskripsi',
  ];
  public function balita()
  {
    return $this->belongsTo(Balita::class, 'id_balita');
  }
  public function vitamin()
  {
    return $this->belongsTo(Vitamin::class, 'id_vitamin');
  }
}
