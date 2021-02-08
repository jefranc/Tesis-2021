<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\area_conocimiento;
use App\area_user;
use App\materia;
use App\materia_user;

class Editar_UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;
        //return view('editar_usuario',  compact('name', 'imagen'));
        return request()->all();
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
    public function show($cedula)
    {
        //return view('editar_usuario');
        return request()->all();
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
    public function update(Request $request, $ced)
    {

        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;


        $cedula=Request()->cedula;
        //$usuario = \DB::table('users')->where('cedula', $cedula)->get();
        $usuario = User::where('cedula', $cedula)->get();
        $usuario1 = User::where('cedula', $cedula)->first();

        $id = $usuario1->id;
        $fechaActual = date('d/m/Y');
        $docente = User::where('id', $id)->get();
        $user = User::find($id);

        if($user->hasPermissionTo('dar_permisos') == 1)
        {
            $roles = "Administrador";
        }else{
            if($user->hasPermissionTo('ver_docentes') == 1){
                $roles = "Director";
            }else{
                if($user->hasPermissionTo('coevaluar') == 1){
                    $roles = "CoEvaluador";
                }else {
                    $roles = "Docente";
                }
            }    
        }

        $areas = \DB::select('select * from area_conocimiento');
        $materias = \DB::select('select * from materias');

        return view('editar_usuario',  compact( 'name', 'fechaActual', 'docente', 'roles', 'usuario', 'usuario1', 'imagen', 'areas', 'materias'));
       // return $id;
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
