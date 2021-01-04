<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Editar_PerfilController extends Controller
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

        return view('editar_perfil',  compact('name', 'cedula', 'email', 'fechaActual', 'imagen'));
    }
}