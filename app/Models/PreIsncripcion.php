<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreIsncripcion extends Model
{
    use HasFactory;

    protected $table = 'pre_inscripcion';

    protected $fillable = [
        'id_postulante',
        'id_programa_estudios',
        'id_proceso',
        'codigo_seguridad',
    ];
}
