<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vitamin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vitamins';
    protected $primaryKey = 'id_vitamin';

    protected $fillable = [
      'id_vitamin',
      'jenis_vitamin',
      'deskripsi',
    ];
}
