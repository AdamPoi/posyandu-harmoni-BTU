<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitamin extends Model
{
  use HasFactory;

  protected $table = 'vitamins';
  protected $primaryKey = 'id_vitamin';

  protected $fillable = [
    'jenis_vitamin',
    'deskripsi',
  ];
}
