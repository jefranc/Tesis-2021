<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'resultado', 'user_id', 'pregunta_id', 'ciclo', 'categoria', 'tipo', 'materia', 'area_conocimiento'
    ];
}
