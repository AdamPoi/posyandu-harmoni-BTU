<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
  use HasFactory;

  public function penimbangan()
  {
    return $this->hasMany(penimbangan::class, 'id_balita');
  }
}
