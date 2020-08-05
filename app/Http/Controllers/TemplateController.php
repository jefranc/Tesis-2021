<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
    public function index()
    {
        return view('Evaluaciones/evaluacion1');
    }
    
    public function principal()
    {

        return view('principal');
    }
}
