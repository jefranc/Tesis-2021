<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosController extends Controller
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
        //$roles = Role::all();

        $model_roles = \DB::select('select * from model_has_roles');
        $roles = \DB::select('select * from roles');

        $docentes = \DB::select('select * from users ORDER BY apellido');
        //$docentes = User::all();
        return view('permisos',  compact('id', 'name', 'cedula', 'email', 'fechaActual', 'imagen', 'docentes', 'roles', 'model_roles'));
    }

    public function modificar()
    {
        
    }

    public function update(Request $request, $id)
    {
        /*$role = Role::find($id);
        $role->permissions()->detach();
        $role->name = $request->name;
        $role->syncPermissions($request->permissions);
        $role->save();
        Flash::success('Role updated successfully.');

        return redirect()->route('permisos.index');*/

        return $request->all();
    }

}
