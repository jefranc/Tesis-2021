<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluadore extends Model
{
    protected $fillable = [
        'ci_coevaluador', 'ci_evaluado', 'status'
    ];
}
