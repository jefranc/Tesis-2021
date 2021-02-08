<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cedula)
    {
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;


        //$usuario = \DB::table('users')->where('cedula', $cedula)->get();
        $usuario = User::where('cedula', $cedula)->get();
        $usuario1 = User::where('cedula', $cedula)->first();

        $id = $usuario1->id;
        $fechaActual = date('d/m/Y');
        $docente = User::where('id', $id)->get();
        $user = User::find($id);

        if ($user->hasPermissionTo('dar_permisos') == 1) {
            $roles = "Administrador";
        } else {
            if ($user->hasPermissionTo('ver_docentes') == 1) {
                $roles = "Director";
            } else {
                if ($user->hasPermissionTo('coevaluar') == 1) {
                    $roles = "CoEvaluador";
                } else {
                    $roles = "Docente";
                }
            }
        }
        $areas = \DB::select('select * from area_conocimiento');
        $materias = \DB::select('select * from materias');

        return view('editar_usuario',  compact('name', 'fechaActual', 'docente', 'roles', 'usuario', 'usuario1', 'imagen', 'areas', 'materias'));
        // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request, $cedula, $tipo)
    {
        /*if($tipo == 'informacion'){
            $user = User::where('cedula', $cedula)->get();

            $user->name = $request->name;
            $user->apellido = $request->apellido;
            $user->email = $request->email;
            $user->cedula = $request->cedula;
            $user->password = Hash::make($request['password']);
            $user->save(); 
    
            return redirect()->route('editar_perfil.index');
        }*/
        return $request->all();
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
            $name = auth()->user()->name;
            $imagen = auth()->user()->imagen;


            $cedula = Request()->cedula;
            //$usuario = \DB::table('users')->where('cedula', $cedula)->get();
            $usuario = User::where('cedula', $cedula)->get();
            $usuario1 = User::where('cedula', $cedula)->first();

            $id = $usuario1->id;
            $fechaActual = date('d/m/Y');
            $docente = User::where('id', $id)->get();
            $user = User::find($id);

            if ($user->hasPermissionTo('dar_permisos') == 1) {
                $roles = "Administrador";
            } else {
                if ($user->hasPermissionTo('ver_docentes') == 1) {
                    $roles = "Director";
                } else {
                    if ($user->hasPermissionTo('coevaluar') == 1) {
                        $roles = "CoEvaluador";
                    } else {
                        $roles = "Docente";
                    }
                }
            }
            $areas = \DB::select('select * from area_conocimiento');
            $materias = \DB::select('select * from materias');

            return view('editar_usuario',  compact('name', 'fechaActual', 'docente', 'roles', 'usuario', 'usuario1', 'imagen', 'areas', 'materias'));
            // return $id;
        }

        if ($tipo == 'informacion') {
            $usuario = new User();
            $cedula = request()->cedula;
            //$usuario = \DB::table('users')->where('cedula', '=', $cedula)->first();
            $usuario = User::where('cedula', '=', $cedula)->first();
            $usuario_count = User::where('cedula', '=', $cedula)->count();

            if ($usuario_count >= 1) {
                $usuario->name = $request->name;
                $usuario->apellido = $request->apellido;
                $usuario->email = $request->email;
                $usuario->cedula = $request->cedula;
                $usuario->password = Hash::make($request['password']);
                $usuario->save();

                $tipo = 'mostrar';
                return redirect()->route('editar_usuario.show', $cedula);
            }
        }
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
