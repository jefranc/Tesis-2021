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

        return view('editar_perfil',  compact('name'));
    }
}