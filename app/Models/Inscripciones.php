<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_postulante',
        'id_usuario',
        'id_programa'
    ];
}
