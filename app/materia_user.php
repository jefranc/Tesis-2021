<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materia_user extends Model
{
    protected $fillable = [
        'materias_id', 'docente'
    ];
}
