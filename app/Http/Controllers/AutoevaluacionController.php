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
        //$preguntas = \DB::select('select * from preguntas');
        $preguntas = Pregunta::where('tipo', 'autoevaluacion')->get();
        $ciclo = Ciclo::where('ciclo_actual','2')->first();

        return view('Evaluaciones/autoevaluacion',  compact('name', 'imagen', 'id', 'cedula', 'preguntas', 'auto', 'ciclo'));
        //return $preguntas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;
        $cedula = auth()->user()->cedula;
        $auto = auth()->user()->auto;
        //$preguntas = \DB::select('select * from preguntas');
        $preguntas = Pregunta::where('tipo', 'autoevaluacion')->get();
        $ciclo = Ciclo::where('ciclo_actual','2')->first();
        $cont = Ciclo::where('ciclo_actual', '2')->count();
        if ($cont == 0) {
            $ciclo = null;
        }

        return view('Evaluaciones/autoevaluacion',  compact('name', 'imagen', 'id', 'cedula', 'preguntas', 'auto', 'ciclo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
