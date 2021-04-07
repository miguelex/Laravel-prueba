<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);

        Permission::create(['name' => 'dashboard',
                            'description' => 'Acceso al escritorio'])->syncRoles([$role1, $role2]);

        // Usuarios
        Permission::create(['name' => 'admin.user.index',
                            'description' => 'Ver listado usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.create',
                            'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.user.edit',
                            'description' => 'Editar usuarios'])->syncRoles([$role1]);
                            Permission::create(['name' => 'admin.user.delete',
                            'description' => 'Borrar usuarios'])->syncRoles([$role1]);

        // Roles
        Permission::create(['name' => 'admin.role.index',
                            'description' => 'Ver listado roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.role.create',
                            'description' => 'Crear rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.role.edit',
                            'description' => 'Editar rol'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.role.delete',
                            'description' => 'Borrar rol'])->syncRoles([$role1]);

        // Roles
        Permission::create(['name' => 'admin.permission.index',
                            'description' => 'Ver listado de permisos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.create',
                            'description' => 'Crear permiso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.edit',
                            'description' => 'Editar permiso'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.permission.delete',
                            'description' => 'Borrar permiso'])->syncRoles([$role1]);

        // Log
        Permission::create(['name' => 'admin.diarios.index',
                            'description' => 'Ver diario'])->syncRoles([$role1]);
                            Permission::create(['name' => 'admin.operaciones.index',
                            'description' => 'Ver listado de operaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.operaciones.create',
                            'description' => 'Crear operacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.operaciones.edit',
                            'description' => 'Editar operacion'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.operaciones.delete',
                            'description' => 'Borrar operacion'])->syncRoles([$role1]);

        // Empleados
        Permission::create(['name' => 'admin.empleados.index',
                            'description' => 'Ver listado empleados'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.empleados.create',
                            'description' => 'Crear empleado'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.empleados.edit',
                            'description' => 'Editar empleado'])->syncRoles([$role2]);
        Permission::create(['name' => 'admin.empleados.delete',
                            'description' => 'Borrar empleado'])->syncRoles([$role2]);
    }
}
