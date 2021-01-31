<?php

namespace App\Http\Controllers;

use App\User;
use App\Pregunta;
use App\Respuesta;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $ced = $request->cedula;
        $user = User::where('cedula', '=' , $ced)->first();
        $pregunta = Pregunta::where('tipo', 'coevaluacion')->get();
        $preguntas = \DB::table('preguntas')->select('id')->where('tipo', '=', 'coevaluacion')->get();
        $preguntas->toArray();
        $num = $pregunta->count();
        $vare=0;
        $vare2=0;
        foreach($preguntas as $preguntas){
            $respuesta = new Respuesta;
            $vare = $preguntas->id;
            $respuesta->resultado = $request->$vare;
            $respuesta->user_id = $request->cedula;
            $respuesta->pregunta_id = $vare;
            $respuesta->ciclo = '2020-2021 C1';
            $respuesta->save(); 
        }
        $user->status = '1';
        $user->save();
        return redirect()->route('coevaluacion_lista.index');
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
