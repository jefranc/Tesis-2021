<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciclo;
use App\Respuesta;
use App\Categoria;

class Resultado_DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $cedula = $request->cedula;
        $email = auth()->user()->email;
        $imagen = auth()->user()->imagen;
        $ciclo = Ciclo::all();
        $ci = 0;

        return view('resultado_docente',  compact('id', 'name', 'cedula', 'email', 'imagen', 'ciclo', 'ci'));
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
    public function show(Request $request,  $ciclos2)
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $cedula = $request->cedula;
        $ciclos = $request->ciclo_actua;
        $email = auth()->user()->email;
        $imagen = auth()->user()->imagen;
        $ciclo = Ciclo::all();
        $ci = 1;
        $array = array();
        //Obtener Valores Coevaluacion
        $res = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'coevaluacion')->get();
        $tic = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 1)->where('tipo', '=', 'coevaluacion')->get();
        $peda = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 2)->where('tipo', '=', 'coevaluacion')->get();
        $dida = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 3)->where('tipo', '=', 'coevaluacion')->get();
        //Obtener Valores Autoevaluacion
        $res2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'autoevaluacion')->get();
        $tic2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 1)->where('tipo', '=', 'autoevaluacion')->get();
        $peda2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 2)->where('tipo', '=', 'autoevaluacion')->get();
        $dida2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 3)->where('tipo', '=', 'autoevaluacion')->get();


        return view('resultado_docente',  compact(
            'id',
            'name',
            'cedula',
            'email',
            'imagen',
            'ciclo',
            'ci',
            'res',
            'tic',
            'peda',
            'dida',
            'res2',
            'tic2',
            'peda2',
            'dida2'
        ));
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
        //
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
