<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constancia extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'estado',
        'url',
        'id_postulante',
        'codigo_seguridad_pre',
        'tipo'
    ];
}
