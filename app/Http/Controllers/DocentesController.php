<?php

namespace App\Http\Controllers;
use App\User;

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

        //$docentes = \DB::table('users')->select('name', 'cedula', 'email')->where('cedula')->get();
        //$docentes = \DB::select('select * from users where cedula = ?', $cedula);
        //$docentes = User::all();
        $docentes = \DB::select('select * from users ORDER BY apellido');
        return view('docentes',  compact('name', 'cedula', 'email', 'fechaActual', 'imagen', 'docentes'));
    }
}