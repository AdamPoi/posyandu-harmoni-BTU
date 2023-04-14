<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
  use HasFactory;
  protected $table = 'pemeriksaans';
  protected $primaryKey = 'id_pemeriksaan';

  protected $fillable = [
    'id_pemeriksaan',
    'id_ibu_hamil',
    'tanggal',
    'catatan'
  ];

  public function ibu_hamil()
  {
    return $this->hasMany(IbuHamil::class, 'id_ibu_hamil');
  }
}
