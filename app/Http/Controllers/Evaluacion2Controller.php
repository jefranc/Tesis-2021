<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Evaluacion2Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;

        return view('Evaluaciones/evaluacion2',  compact('name', 'imagen'));
    }
}