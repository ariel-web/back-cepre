<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    public function getProvinciasPorDepartamento($departamento)
    {
        return $this->where('cod_dep', $departamento, )->get();
    }
}
