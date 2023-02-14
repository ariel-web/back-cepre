<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_doc',
        'nro_doc',
        'primer_apellido',
        'segundo_apellido',
        'apellido_casada',
        'nombres',
        'sexo',
        'fec_nacimiento',
        'ubigeo_nacimiento',
        'ubigeo_residencia',
        'discapacidad',
        'tipo_discapacidad',
        'celular',
        'email',
        'estado_civil',
        'direccion',
        'anio_egreso',
        'correo_institucional',
        'cod_orcid',
        'observaciones',
        'id_colegio',
    ];
 
    
}

