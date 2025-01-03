<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposListas extends Model
{
    use HasFactory;

    protected $table = "tipos_listas";

    protected $fillable = [
      'nombre'
    ];
}
