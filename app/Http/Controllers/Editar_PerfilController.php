<?php

namespace App\Http\Controllers;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use IlluminateSupportFacadesHash;
use Auth;


class Editar_PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $apellido = auth()->user()->apellido;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $fechaActual = date('d/m/Y');
        $imagen = auth()->user()->imagen;
        $docente = User::where('id', $id)->get();
        $user = User::find($id);

        if($user->hasPermissionTo('dar_permisos') == 1)
        {
            $roles = "Administrador";
        }else{
            if($user->hasPermissionTo('coevaluar') == 1){
                $roles = "CoEvaluador";
            }else{
                if($user->hasPermissionTo('ver_docentes') == 1){
                    $roles = "Director";
                }else {
                    $roles = "Docente";
                }
            }    
        }

        return view('editar_perfil',  compact('id', 'name', 'apellido', 'cedula', 'email', 'fechaActual', 'imagen', 'docente', 'roles'));

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

        // carga de imagen a la BD y obtencion de la ruta donde se guarda
        $request->validate([
            'file' => 'required|image|max:5120'
        ]);
        $imagen = $request->file('file')->store('public');

        $cedula = auth()->user()->cedula;
        $url = Storage::url($imagen);
        $ima=User::where('cedula', '=' , $cedula)->first();
        $ima->imagen = $url;
        $ima->save();    

        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $apellido = auth()->user()->apellido;
        $email = auth()->user()->email;
        $fechaActual = date('d/m/Y');
        $imagen = auth()->user()->imagen;
        $docente = User::where('id', $id)->get();
        $user = User::find($id);
        if($user->hasPermissionTo('dar_permisos') == 1)
        {
            $roles = "Administrador";
        }else{
            if($user->hasPermissionTo('coevaluar') == 1){
                $roles = "CoEvaluador";
            }else{
                if($user->hasPermissionTo('ver_docentes') == 1){
                    $roles = "Director";
                }else {
                    $roles = "Docente";
                }
            }    
        }

        return view('editar_perfil',  compact('id', 'name', 'apellido', 'cedula', 'email', 'fechaActual', 'imagen', 'docente', 'roles'));

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
        //$usuario = User::findOrFail($id);

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
        //se actualiza informacion del usuario

        $user = User::where('id', '=' , $id)->first();

        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->cedula = $request->cedula;
        $user->password = Hash::make($request['password']);
        $user->save(); 

        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $apellido = auth()->user()->apellido;
        $cedula = auth()->user()->cedula;
        $email = auth()->user()->email;
        $fechaActual = date('d/m/Y');
        $imagen = auth()->user()->imagen;
        $docente = User::where('id', $id)->get();
        $user = User::find($id);

        if($user->hasPermissionTo('dar_permisos') == 1)
        {
            $roles = "Administrador";
        }else{
            if($user->hasPermissionTo('coevaluar') == 1){
                $roles = "CoEvaluador";
            }else{
                if($user->hasPermissionTo('ver_docentes') == 1){
                    $roles = "Director";
                }else {
                    $roles = "Docente";
                }
            }    
        }

        return view('editar_perfil',  compact('id', 'name', 'apellido', 'cedula', 'email', 'fechaActual', 'imagen', 'docente', 'roles'));
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
