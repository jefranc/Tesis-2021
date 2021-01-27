<?php

namespace App\Http\Controllers;

use App\User;
use App\Pregunta;
use Illuminate\Http\Request;

class Coevaluacion_ListaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $fechaActual = date('d/m/Y');
        $imagen = auth()->user()->imagen;

        //$docentes = \DB::table('users')->select('name', 'cedula', 'email')->where('cedula')->get();
        //$docentes = \DB::select('select * from users where cedula = ?', $cedula);
        $docentes = User::where('evaluador', $cedula)->get();
        $preguntas = Pregunta::where('tipo', 'coevaluacion')->get();

        return view('coevaluacion_lista',  compact('id','name', 'cedula', 'email', 'fechaActual', 'docentes', 'imagen', 'preguntas'));
    }
}