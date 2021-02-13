<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciclo;
use App\Respuesta;
use App\Categoria;
use phpDocumentor\Reflection\Types\Null_;

class ResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $imagen = auth()->user()->imagen;
        $ciclo = Ciclo::all();
        $ci = 0;

        return view('resultados',  compact('id', 'name', 'cedula', 'email', 'imagen', 'ciclo', 'ci'));
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
    public function show($ciclos)
    {

        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $imagen = auth()->user()->imagen;
        $ciclo = Ciclo::all();
        $ci = 1;
        $array = array();
        //Obtener Valores Coevaluacion
        $res = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'coevaluacion')->get();
        $conta_coe = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'coevaluacion')->count();
        $tic = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 1)->where('tipo', '=', 'coevaluacion')->get();
        $peda = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 2)->where('tipo', '=', 'coevaluacion')->get();
        $dida = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 3)->where('tipo', '=', 'coevaluacion')->get();
        //Obtener Valores Autoevaluacion
        $res2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'autoevaluacion')->get();
        $conta_auto = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('tipo', '=', 'autoevaluacion')->count();
        $tic2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 1)->where('tipo', '=', 'autoevaluacion')->get();
        $peda2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 2)->where('tipo', '=', 'autoevaluacion')->get();
        $dida2 = \DB::table('respuestas')->where('user_id', $cedula)->where('ciclo', $ciclos)->where('categoria', 3)->where('tipo', '=', 'autoevaluacion')->get();


        /////////////////////////////////////////////////////////////////////////////////////////
        //calculo de los resultados autoevaluacion de TICS
        if ($conta_auto != null) {
            $resultado_auto_tic = 0;
            $contador_preguntas = 0;
            foreach ($tic2 as $ti) {
                if ($ti->resultado == 1) {
                    $resultado_auto_tic = $resultado_auto_tic + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 2) {
                    $resultado_auto_tic = $resultado_auto_tic + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 3) {
                    $resultado_auto_tic = $resultado_auto_tic + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 4) {
                    $resultado_auto_tic = $resultado_auto_tic + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_auto_tic = ($resultado_auto_tic / $contador_preguntas) * 100;
            $resultado_auto_tic = round($resultado_auto_tic, 2);

            //calculo de los resultados autoevaluacion de Pedagogicos
            $resultado_auto_peda = 0;
            $contador_preguntas = 0;
            foreach ($peda2 as $pe) {
                if ($pe->resultado == 1) {
                    $resultado_auto_peda = $resultado_auto_peda + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 2) {
                    $resultado_auto_peda = $resultado_auto_peda + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 3) {
                    $resultado_auto_peda = $resultado_auto_peda + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 4) {
                    $resultado_auto_peda = $resultado_auto_peda + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_auto_peda = ($resultado_auto_peda / $contador_preguntas) * 100;
            $resultado_auto_peda = round($resultado_auto_peda, 2);

            //calculo de los resultados autoevaluacion de Didacticas
            $resultado_auto_dida = 0;
            $contador_preguntas = 0;
            foreach ($dida2 as $di) {
                if ($di->resultado == 1) {
                    $resultado_auto_dida = $resultado_auto_dida + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 2) {
                    $resultado_auto_dida = $resultado_auto_dida + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 3) {
                    $resultado_auto_dida = $resultado_auto_dida + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 4) {
                    $resultado_auto_dida = $resultado_auto_dida + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_auto_dida = ($resultado_auto_dida / $contador_preguntas) * 100;
            $resultado_auto_dida = round($resultado_auto_dida, 2);
        } else {
            $resultado_auto_dida = 'No existen resultados';
            $resultado_auto_peda = 'No existen resultados';
            $resultado_auto_tic = 'No existen resultados';
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //calculo de los resultados coevaluacion de TICS
        if ($conta_coe != null) {
            $resultado_coe_tic = 0;
            $contador_preguntas = 0;
            foreach ($tic as $ti) {
                if ($ti->resultado == 1) {
                    $resultado_coe_tic = $resultado_coe_tic + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 2) {
                    $resultado_coe_tic = $resultado_coe_tic + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 3) {
                    $resultado_coe_tic = $resultado_coe_tic + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($ti->resultado == 4) {
                    $resultado_coe_tic = $resultado_coe_tic + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_coe_tic = ($resultado_coe_tic / $contador_preguntas) * 100;
            $resultado_coe_tic = round($resultado_coe_tic, 2);

            //calculo de los resultados coevaluacion de Pedagogicos
            $resultado_coe_peda = 0;
            $contador_preguntas = 0;
            foreach ($peda as $pe) {
                if ($pe->resultado == 1) {
                    $resultado_coe_peda = $resultado_coe_peda + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 2) {
                    $resultado_coe_peda = $resultado_coe_peda + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 3) {
                    $resultado_coe_peda = $resultado_coe_peda + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($pe->resultado == 4) {
                    $resultado_coe_peda = $resultado_coe_peda + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_coe_peda = ($resultado_coe_peda / $contador_preguntas) * 100;
            $resultado_coe_peda = round($resultado_coe_peda, 2);

            //calculo de los resultados coevaluacion de Didacticas
            $resultado_coe_dida = 0;
            $contador_preguntas = 0;
            foreach ($dida as $di) {
                if ($di->resultado == 1) {
                    $resultado_coe_dida = $resultado_coe_dida + 0;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 2) {
                    $resultado_coe_dida = $resultado_coe_dida + 0.5;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 3) {
                    $resultado_coe_dida = $resultado_coe_dida + 0.75;
                    $contador_preguntas = $contador_preguntas + 1;
                } elseif ($di->resultado == 4) {
                    $resultado_coe_dida = $resultado_coe_dida + 1;
                    $contador_preguntas = $contador_preguntas + 1;
                }
            }
            $resultado_coe_dida = ($resultado_coe_dida / $contador_preguntas) * 100;
            $resultado_coe_dida = round($resultado_coe_dida, 2);
        } else {
            $resultado_coe_dida = 'No existen resultados';
            $resultado_coe_peda = 'No existen resultados';
            $resultado_coe_tic = 'No existen resultados';
        }

        return view('resultados',  compact(
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
            'dida2',
            'resultado_auto_tic',
            'resultado_auto_peda',
            'resultado_auto_dida',
            'resultado_coe_tic',
            'resultado_coe_peda',
            'resultado_coe_dida'
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
