<?php

namespace App\Http\Controllers;

use App\User;
use App\Pregunta;
use App\Respuesta;
use App\Ciclo;
use App\materia_user;
use App\area_conocimiento;
use App\area_user;
use App\materia;
use App\Comprobacione;

use Illuminate\Http\Request;

class CoevaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function update(Request $request, $tipo)
    {
        if ($tipo == 'mostrar') {
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $cedula = $request->cedula;
            $email = auth()->user()->email;
            $fechaActual = date('d/m/Y');
            $imagen = auth()->user()->imagen;
            $preguntas = Pregunta::where('tipo', 'coevaluacion')->get();
            $ciclo = $request->ciclo;
            $materias = materia_user::join("materias", "materias.id", "=", "materia_users.materias_id")->select("materias.materia")
                ->where("materia_users.docente", "=", $cedula)->get();
            $areas = area_user::join("area_conocimientos", "area_conocimientos.id", "=", "area_users.area_conocimiento_id")
                ->select("area_conocimientos.area")->where("area_users.usuario", "=", auth()->user()->cedula)->get();

            $comprobacion = Comprobacione::where([['ci_coevaluador_id','=',auth()->user()->cedula],
            ['evaluado','=', $cedula]])->first();

            return view('Evaluaciones/coevaluacion',  compact(
                'id',
                'name',
                'cedula',
                'email',
                'fechaActual',
                'imagen',
                'preguntas',
                'ciclo',
                'materias',
                'areas',
                'comprobacion'
            ));
            return $comprobacion->estado;
        }

        if ($tipo == 'coe') {
            $request->validate([
                'area', 'materia' => 'required'
            ]);
            
            $ced = $request->cedula;
            $user = User::where('cedula', '=', $ced)->first();
            $ciclo = Ciclo::where('ciclo_actual', '2')->first();
            $preguntas = \DB::table('preguntas')->where('tipo', '=', 'coevaluacion')->get();

            $vare = 0;
            $vare2 = 0;
            foreach ($preguntas as $preguntas) {
                $respuesta = new Respuesta;
                $vare = $preguntas->id;
                $respuesta->resultado = $request->$vare;
                $respuesta->user_id = $ced;
                $respuesta->pregunta_id = $vare;
                $respuesta->ciclo = $ciclo->ciclo;
                $respuesta->categoria = $preguntas->categoria_id;
                $respuesta->tipo = $preguntas->tipo;
                $respuesta->materia = $request->materia;
                $respuesta->area_conocimiento = $request->area;
                $respuesta->save();
            }
            \DB::table('respuestas')
            ->where([['pregunta_id','=',$vare],
            ['user_id','=', $ced], ['materia','=', $request->materia]])
            ->update(['observaciones' => $request->observaciones]);


            \DB::table('comprobaciones')
            ->where([['ci_coevaluador_id','=',auth()->user()->cedula],
            ['evaluado','=', $ced]])
            ->update(['estado' => 1]);
            return redirect()->route('coevaluacion_lista.show', $user->id)->with('success', 'Evaluacion guardada con exito');
        }
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
