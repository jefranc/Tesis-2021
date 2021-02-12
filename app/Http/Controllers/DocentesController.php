<?php

namespace App\Http\Controllers;
use App\User;
use App\Ciclo;

class DocentesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $name = auth()->user()->name;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $fechaActual = date('d/m/Y');
        $imagen = auth()->user()->imagen;

        $docentes = \DB::select('select * from users ORDER BY apellido');
        $ciclo = Ciclo::all();
        return view('docentes',  compact('name', 'cedula', 'email', 'fechaActual', 'imagen', 'docentes', 'ciclo'));
    }
}