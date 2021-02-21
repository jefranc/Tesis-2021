<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comprobacione_auto extends Model
{
    protected $fillable = [
        'docente', 'materia', 'estado'
    ];
}
