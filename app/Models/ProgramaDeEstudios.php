<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaDeEstudios extends Model
{
    use HasFactory;

    public function getProgramaDeEstudios() //all
    {
        return $this->all();
    }

}
