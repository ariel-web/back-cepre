<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    use HasFactory;

    public function getColegiosPorUbigeo($ubigeo)
    {
        return $this->where('ubigeo', $ubigeo)->get();
    }

}