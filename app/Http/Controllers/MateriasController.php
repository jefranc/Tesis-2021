<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciclo;
use App\area_conocimiento;
use App\materia;

class MateriasController extends Controller
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

        $areas = area_conocimiento::all();
        $materias = materia::all();
        return view('inserts/materias',  compact('name', 'cedula', 'email', 'imagen', 'areas', 'materias'));
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
        //agregar una nueva area
        if ($tipo == 'agregar_area') {
            $areas = new area_conocimiento();
            $areas->area = $request->area;
            $areas->save();
        }

        //eliminar un area
        if ($tipo == 'eliminar_area') {
            $materias = materia::all();
            $areas = $request->areain;
            foreach($materias as $materia){
                if($materia->area == $areas){
                    materia::where('area', $areas)->delete();
                }
            }
            area_conocimiento::where('area', $areas)->delete();
        }

        //agregar una nueva materia
        if ($tipo == 'agregar_materia') {
            $materias = new materia();
            $materias->materia = $request->mate;
            $materias->area = $request->area;
            $materias->save();
        }

        //eliminar una materia
        if ($tipo == 'eliminar_mate') {
            $mate = $request->matein;
            materia::where('materia', $mate)->delete();
        }


        return redirect()->route('materias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $area)
    {

    }
}
