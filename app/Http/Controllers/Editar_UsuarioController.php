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
use App\Ciclo;

class Editar_UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $name = auth()->user()->name;
        $imagen = auth()->user()->imagen;


        $cedula = Request()->cedula;
        $usuario = User::where('cedula', $cedula)->get();
        $usuario1 = User::where('cedula', $cedula)->first();


        $id = $usuario1->id;
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
        $areas = \DB::select('select * from area_conocimientos');
        $areas_user =  \DB::table('area_users')->where('usuario', $cedula)->get();
        $areacount =  area_user::where('usuario', $cedula)->count();
        $materias = \DB::select('select * from materias');
        $mate =  \DB::table('materia_users')->where('docente', $cedula)->get();
        $matecount =  materia_user::where('docente', $cedula)->count();
        $ciclo = Ciclo::all();
        $mate_user = materia_user::join("materias", "materias.id", "=", "materia_users.materias_id")->select("materias.materia")
            ->where("materia_users.docente", "=", $cedula)->get();
        $user_areas = area_user::join("area_conocimientos", "area_conocimientos.id", "=", "area_users.area_conocimiento_id")
            ->select("area_conocimientos.area")->where("area_users.usuario", "=", $cedula)->get();


        return view('editar_usuario',  compact(
            'name',
            'docente',
            'roles',
            'usuario',
            'usuario1',
            'imagen',
            'areas',
            'materias',
            'mate',
            'matecount',
            'areas_user',
            'areacount',
            'ciclo',
            'mate_user',
            'user_areas'
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

        $usuario = User::where('cedula', $cedula)->get();
        $usuario1 = User::where('cedula', $cedula)->first();
        $mate = materia_user::where('docente', $cedula)->get();
        $matecount =  materia_user::where('docente', $cedula)->count();

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
        $areas = \DB::select('select * from area_conocimientos');
        $areas_user =  \DB::table('area_users')->where('usuario', $cedula)->get();
        $areacount =  area_user::where('usuario', $cedula)->count();
        $materias = \DB::select('select * from materias');
        $mate =  \DB::table('materia_users')->where('docente', $cedula)->get();
        $matecount =  materia_user::where('docente', $cedula)->count();
        $mate_user = materia_user::join("materias", "materias.id", "=", "materia_users.materias_id")->select("materias.materia")
            ->where("materia_users.docente", "=", $cedula)->get();
        $user_areas = area_user::join("area_conocimientos", "area_conocimientos.id", "=", "area_users.area_conocimiento_id")
            ->select("area_conocimientos.area")->where("area_users.usuario", "=", $cedula)->get();

        return view('editar_usuario',  compact(
            'name',
            'fechaActual',
            'docente',
            'roles',
            'usuario',
            'usuario1',
            'imagen',
            'areas',
            'materias',
            'mate',
            'matecount',
            'areas_user',
            'areacount',
            'mate_user',
            'user_areas'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($request, $cedula, $tipo)
    {
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
        //Update de la informacion del docente seleccionado
        if ($tipo == 'informacion') {
            $usuario = new User();
            $cedula = request()->cedula;
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
        //Update de Areas del Conocimiento
        if ($tipo == 'area') {
            $areas = area_conocimiento::all();
            //dd(!empty($request->areas));
            $contador = area_user::where('usuario', $request->cedula)->count();
            if ($contador != null && !empty($request->areas)) {                                                //comprobando si existen valores iguales en la BD
                area_user::where('usuario', $request->cedula)->delete();
                $var = count($request->areas);
                foreach ($areas as $area) {
                    $mate = new area_user();
                    for ($i = 0; $i < $var; $i++) {
                        if ($area->area == $request->areas[$i]) {
                            $mate->area_conocimiento_id = $area->id;
                            $mate->usuario = $request->cedula;
                            $mate->save();
                        }
                    }
                }
                return redirect()->route('editar_usuario.show', $request->cedula);
            } elseif (!empty($request->areas)) {
                $var = count($request->areas);
                foreach ($areas as $area) {
                    $mate = new area_user();
                    for ($i = 0; $i < $var; $i++) {
                        if ($area->area == $request->areas[$i]) {
                            $mate->area_conocimiento_id = $area->id;
                            $mate->usuario = $request->cedula;
                            $mate->save();
                        }
                    }
                }
                return redirect()->route('editar_usuario.show', $request->cedula);
            }
            area_user::where('usuario', $request->cedula)->delete();
            return redirect()->route('editar_usuario.show', $request->cedula);
        }
        //Update de Materias del docente
        if ($tipo == 'materia') {
            $materias = materia::all();

            $contador = materia_user::where('docente', $request->cedula)->count();

            if ($contador != null && !empty($request->materia)) {                                                //comprobando si existen valores iguales en la BD
                materia_user::where('docente', $request->cedula)->delete();
                $var = count($request->materia);
                foreach ($materias as $materias) {
                    $mate = new materia_user();
                    for ($i = 0; $i < $var; $i++) {
                        if ($materias->materia == $request->materia[$i]) {
                            $mate->materias_id = $materias->id;
                            $mate->docente = $request->cedula;
                            $mate->save();
                        }
                    }
                }
                return redirect()->route('editar_usuario.show', $request->cedula);
            } elseif (!empty($request->materia)) {
                $var = count($request->materia);
                foreach ($materias as $materias) {
                    $mate = new materia_user();
                    for ($i = 0; $i < $var; $i++) {
                        if ($materias->materia == $request->materia[$i]) {
                            $mate->materias_id = $materias->id;
                            $mate->docente = $request->cedula;
                            $mate->save();
                        }
                    }
                }
                return redirect()->route('editar_usuario.show', $request->cedula);
            }
            materia_user::where('docente', $request->cedula)->delete();
            return redirect()->route('editar_usuario.show', $request->cedula);
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
