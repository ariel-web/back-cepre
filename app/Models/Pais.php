<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $table = 'paises';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getPaises() //all
    {
        return $this->select()->get();
    }


}
