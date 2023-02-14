<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nro_operacion',
        'fecha',
        'hora',
        'codigo',
        'monto',
        //'id_postulante',
        //'id_proceso',
        'codigo_seguridad_pre',
    ];
}
