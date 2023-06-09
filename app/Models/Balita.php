<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
  use HasFactory;

  protected $table = 'balitas';
  protected $primaryKey = 'id_balita';

  protected $fillable = [
    'id_ibu_hamil',
    'nama',
    'nama_ayah',
    'nama_ibu',
    'usia',
    'jenis_kelamin',
    'tanggal_lahir'
  ];

  public function penimbangan()
  {
    return $this->hasMany(penimbangan::class, 'id_balita');
  }
  public function ibu_hamil()
  {
    return $this->belongsTo(IbuHamil::class, 'id_ibu_hamil');
  }
}
