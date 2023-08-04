<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1= Role::create(['name' => 'Admin']);
       $role2= Role::create(['name' => 'Moderador']);

                            //Dashboard
       Permission::create(['name' => 'dashboard',
                            'description' => 'Acceso al Dashboard'])->syncRoles([$role1,$role2]);

                            //Articles
       Permission::create(['name' => 'articles.index',
                            'description' => 'Ver Tabla de Artículos'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'articles.create',
                            'description' => 'Crear artículos'])->syncRoles([$role1]);
       Permission::create(['name' => 'articles.update',
                            'description' => 'Editar Artículos'])->syncRoles([$role1]);
       Permission::create(['name' => 'articles.destroy',
                            'description' => 'Eliminar Artículos'])->syncRoles([$role1]);
       
                            //Students
       Permission::create(['name' => 'students.index',
                            'description' => 'Ver Tabla de Estudiantes'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'students.create',
                            'description' => 'Crear Estudiante'])->syncRoles([$role1]);
       Permission::create(['name' => 'students.update',
                            'description' => 'Editar Estudiante'])->syncRoles([$role1]);
       Permission::create(['name' => 'students.destroy',
                            'description' => 'Eliminar Estudiante'])->syncRoles([$role1]);
       
                            //Academy
       Permission::create(['name' => 'academy.index',
                            'description' => 'Ver Tabla de Academias'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'academy.create',
                            'description' => 'Crear Academia'])->syncRoles([$role1]);
       Permission::create(['name' => 'academy.update',
                            'description' => 'Editar Academia'])->syncRoles([$role1]);
       Permission::create(['name' => 'academy.destroy',
                            'description' => 'Eliminar Academia'])->syncRoles([$role1]);

                            //Operations
       Permission::create(['name' => 'operations.index',
                            'description' => 'Ver Tabla de Operaciones'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'operations.create',
                            'description' => 'Realizar Préstamo de Artículo'])->syncRoles([$role1]);
       Permission::create(['name' => 'operations.update',
                            'description' => 'Realizar Devolución de Artículo'])->syncRoles([$role1]);   

                            //User
       Permission::create(['name' => 'user.index',
                            'description' => 'Ver Tabla de Usuarios'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'user.create',
                            'description' => 'Crear Usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'user.update',
                            'description' => 'Editar Usuarios'])->syncRoles([$role1]);
       Permission::create(['name' => 'user.destroy',
                            'description' => 'Eliminar Usuarios'])->syncRoles([$role1]);        

                            //Role
       Permission::create(['name' => 'role.index',
                            'description' => 'Ver Tabla de Roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'role.edit',
                            'description' => 'Editar Roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'role.create',
                            'description' => 'Crear Roles'])->syncRoles([$role1]);
       Permission::create(['name' => 'role.destroy',
                            'description' => 'Eliminar Roles'])->syncRoles([$role1]);
          
    }
}
