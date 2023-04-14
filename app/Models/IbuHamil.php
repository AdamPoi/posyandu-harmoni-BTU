<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
  use HasFactory;


  public function pemeriksaan()
  {
    return $this->hasMany(Pemeriksaan::class, 'id_ibu_hamil');
  }
}
