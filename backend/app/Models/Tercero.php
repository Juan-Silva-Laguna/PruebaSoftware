<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tercero extends Model
{
    use HasFactory;

    protected $table = "terceros";

    protected $fillable = [
      'tipo_identificacion_id',
      'numero_identificacion',
      'nombre1',
      'nombre2',
      'apellido1',
      'apellido2',
      'idmunicipio_id',
      'tipo_contribuyente_id',
      'tipo_tercero_id',
      'departamento_id'
    ];
}
