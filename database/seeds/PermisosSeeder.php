<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $per_ver_docentes = Permission::create(['name' => 'ver_docentes']);
        $per_evaluar = Permission::create(['name' => 'evaluar']);
        $per_coevaluacion = Permission::create(['name' => 'coevaluar']);
        $per_dar_permisos = Permission::create(['name' => 'dar_permisos']);
        //roles para Coevaluador
        $role_coevaluador = Role::create(['name' => 'coevaluador']);
        $role_coevaluador->givePermissionTo($per_evaluar);
        $role_coevaluador->givePermissionTo($per_coevaluacion);

        //Roles Director
        $role_director = Role::create(['name' => 'director']);
        $role_director->givePermissionTo($per_ver_docentes);

        //Roles para Docente
        $role_docente = Role::create(['name'=> 'docente']);
        $role_docente->givePermissionTo($per_evaluar);

        //Roles para Admin
        $role_admin = Role::create(['name' => 'admin']);
        $role_admin->givePermissionTO($per_dar_permisos);

        $user = User::create([
            'name' => 'Styde',    //coevaluador
            'apellido' => 'Cuesta',
            'email' => 'admin@styde.net',
            'cedula' => '1478521462',
            'password' => bcrypt('secret'),
            'imagen' => 'fotoperfil/defecto.png',
            'status' => '0',
            'auto' => '0'
        ]);


        $user2 = User::create([    //director
            'name' => 'Jean',
            'apellido' => 'Mosquera',
            'email' => 'jefranc_10@hotmail.com',
            'cedula' => '0706256468',
            'password' => bcrypt('oliver123*'),
            'imagen' => 'fotoperfil/defecto.png',
            'status' => '0',
            'auto' => '0'
        ]);

        $user3 = User::create([
            'name' => 'Erika',    //docente
            'apellido' => 'Mosquera',  
            'email' => 'erika@hotmail.com',
            'cedula' => '0704568910',
            'password' => bcrypt('oliver123*'),
            'imagen' => 'fotoperfil/defecto.png',
            'status' => '0',
            'auto' => '0'
        ]);

        $user4 = User::create([
            'name' => 'admin',
            'apellido' => 'admin',    //admin
            'email' => 'admin@hotmail.com',
            'cedula' => '0993453080',
            'password' => bcrypt('oliver123*'),
            'imagen' => 'fotoperfil/defecto.png',
            'status' => '0',
            'auto' => '0'
        ]);
        // Asignación del rol
        $user->assignRole('coevaluador');
        $user2->assignRole('director');
        $user3->assignRole('docente');
        $user4->assignRole('admin');
        $user4->assignRole('coevaluador');
        $user4->assignRole('director');
        $user4->assignRole('docente');

    }
}
