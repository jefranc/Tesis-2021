<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciclo;
use App\area_conocimiento;
use App\materia;
use App\comprobacione_auto;
use App\comprobacione;

class CiclosController extends Controller
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
        $imagen = auth()->user()->imagen;
        $ciclos = Ciclo::all();
        $ciclo_actual = Ciclo::where('ciclo_actual', '2')->first();
        if ($ciclo_actual == null) {
            $ciclo_actual = ' ';
        } else {
            $ciclo_actual = $ciclo_actual->ciclo;
        }
        $areas = area_conocimiento::all();
        $materias = materia::all();
        return view('inserts/ciclos',  compact(
            'name',
            'cedula',
            'email',
            'imagen',
            'areas',
            'materias',
            'ciclo_actual',
            'ciclos'
        ));
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
        //añadir un nuevo ciclo
        if ($tipo == 'nuevo_ciclo') {
            $ci = new Ciclo();
            $ci->ciclo = $request->ci;
            $ci->ciclo_actual = '1';
            $ci->save();
        }

        //eliminar un ciclo
        if ($tipo == 'eliminar_ciclo') {
            $ci = Ciclo::where('ciclo', $request->ciclo_eliminar)->first();
            $ci->delete();
        }

        //asignar ciclo actual
        if ($tipo == 'ciclo_actual') {
            $ciclo =  Ciclo::where('ciclo_actual', '2')->first();
            if ($ciclo == null) {
                $ciclo =  Ciclo::where('ciclo', $request->cic)->first();
                $ciclo->ciclo_actual = '2';
                $ciclo->save();
            }else{
                $ciclo->ciclo_actual = '1';
                $ciclo->save();
            }
            $ciclo =  Ciclo::where('ciclo', $request->cic)->first();
            $ciclo->ciclo_actual = '2';
            $ciclo->save();
        }
        return redirect()->route('ciclos.index');
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
