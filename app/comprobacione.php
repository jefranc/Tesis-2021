<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comprobacione extends Model
{
    protected $fillable = [
        'ci_coevaluador_id', 'evaluado', 'estado'
    ];
}
