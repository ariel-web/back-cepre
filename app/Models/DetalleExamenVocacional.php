<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleExamenVocacional extends Model
{
    use HasFactory;


    protected $table = 'detalle_examen_vocacional';

    protected $fillable = [
        'id_examen_vocacional',
        'id_pregunta',
        'id_postulante',
        'id_respuesta',
        'codigo_pre',
    ];
}
