<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan extends Model
{
  use HasFactory;

  public function balita()
  {
    return $this->belongsTo(Balita::class, 'id_balita');
  }
}
