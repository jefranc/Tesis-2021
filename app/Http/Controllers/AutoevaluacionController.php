<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pregunta;
use App\Respuesta;
use App\Ciclo;
use App\Categoria;
Use Session;
Use Redirect;

class AutoevaluacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;
        $cedula = auth()->user()->cedula;
        $auto = auth()->user()->auto;
        $preguntas = Pregunta::where('tipo', 'autoevaluacion')->get();
        $ciclo = Ciclo::where('ciclo_actual','2')->first();

        return view('Evaluaciones/autoevaluacion',  compact('name', 'imagen', 'id', 'cedula', 'preguntas', 'auto', 'ciclo'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;
        $cedula = auth()->user()->cedula;
        $auto = auth()->user()->auto;
        $preguntas = Pregunta::where('tipo', 'autoevaluacion')->get();
        $ciclo = Ciclo::where('ciclo_actual','2')->first();
        $cont = Ciclo::where('ciclo_actual', '2')->count();
        if ($cont == 0) {
            $ciclo = null;
        }

        return view('Evaluaciones/autoevaluacion',  compact('name', 'imagen', 'id', 'cedula', 'preguntas', 'auto', 'ciclo'));
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $cedula)
    {

        $user = User::where('cedula', '=' , $cedula)->first();
        $ciclo = Ciclo::where('ciclo_actual','2')->first();
        $preguntas = \DB::table('preguntas')->where('tipo', '=', 'autoevaluacion')->get();
        $vare=0;
        foreach($preguntas as $preguntas){
            $respuesta = new Respuesta;
            $vare = $preguntas->id;
            $respuesta->resultado = $request->$vare;
            $respuesta->user_id = $request->cedula;
            $respuesta->pregunta_id = $vare;
            $respuesta->ciclo = $ciclo->ciclo;
            $respuesta->categoria = $preguntas->categoria_id;
            $respuesta->tipo = $preguntas->tipo;
            $respuesta->save(); 
        }
        $user->auto = '1';
        $user->save();
        
    return redirect()->route('autoevaluacion.show', $user->id);

    }

    public function destroy($id)
    {
        //
    }
}
