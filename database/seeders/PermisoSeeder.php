<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$role1 = Role::create(['name' => 'ADMIN']);
        $role2 = Role::create(['name' => 'COOESTATAL']);
        $role2 = Role::create(['name' => 'COOMUNICIPAL']);
        $role3 = Role::create(['name' => 'COOGRUPO']);
        $role4 = Role::create(['name' => 'RESPONSABLERED']);
        $role5 = Role::create(['name' => 'SIMPATIZANTES']);*/
        // Obtener los roles existentes por nombre
        $role1 = Role::where('name', 'ADMIN')->first();
        $role2 = Role::where('name', 'COOESTATAL')->first();
        $role3 = Role::where('name', 'COOMUNICIPAL')->first();
        $role4 = Role::where('name', 'COOGRUPO')->first();
        $role5 = Role::where('name', 'RESPONSABLERED')->first();
        $role6 = Role::where('name', 'SIMPATIZANTES')->first();

        /*--------------------------------------------------------------------------------------------------------------------*/
        //$permission = Permission::create(['name' => 'prueba', 'description' => 'Ver pantalla de prueba'])->syncRoles([$role1, $role2]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        $permission = Permission::create(['name' => 'estatal.index', 
                                        'description' => 'Ver pantalla de COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.create', 
                                        'description' => 'crear COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.store', 
                                        'description' => 'guardar COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.show', 
                                        'description' => 'ver COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.edit', 
                                        'description' => 'ir a editar COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.update', 
                                        'description' => 'actualizar COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.destroy', 
                                        'description' => 'eliminar COOESTATAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'estatal.deactivate',
                                        'description' => 'desactivar COOESTATAL'])->syncRoles([$role1]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        //$permission = Permission::create(['name' => 'prueba', 'description' => 'Ver pantalla de prueba'])->syncRoles([$role1, $role2]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        $permission = Permission::create(['name' => 'municipal.index', 
                                        'description' => 'Ver pantalla de COOMUNICIPAL'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'municipal.create', 
                                        'description' => 'crear COOMUNICIPAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'municipal.store', 
                                        'description' => 'guardar COOMUNICIPAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'municipal.show', 
                                        'description' => 'ver COOMUNICIPAL completo'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'municipal.edit', 
                                        'description' => 'ir a editar COOMUNICIPAL'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'municipal.update', 
                                        'description' => 'actualizar COOMUNICIPAL'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'municipal.destroy', 
                                        'description' => 'eliminar COOMUNICIPAL'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'municipal.deactivate',
                                        'description' => 'desactivar COOMUNICIPAL'])->syncRoles([$role1]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        //$permission = Permission::create(['name' => 'prueba', 'description' => 'Ver pantalla de prueba'])->syncRoles([$role1, $role2]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        $permission = Permission::create(['name' => 'grupo.index', 
                                        'description' => 'Ver pantalla de COOGRUPO'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'grupo.create', 
                                        'description' => 'crear COOGRUPO'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'grupo.store', 
                                        'description' => 'guardar COOGRUPO'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'grupo.show', 
                                        'description' => 'ver COOGRUPO completo'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'grupo.edit', 
                                        'description' => 'ir a editar COOGRUPO'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'grupo.update', 
                                        'description' => 'actualizar COOGRUPO'])->syncRoles([$role1, $role2, $role3]);
        $permission = Permission::create(['name' => 'grupo.destroy', 
                                        'description' => 'eliminar COOGRUPO'])->syncRoles([$role1, $role2]);
        $permission = Permission::create(['name' => 'grupo.deactivate',
                                        'description' => 'desactivar COOGRUPO'])->syncRoles([$role1, $role2]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        //$permission = Permission::create(['name' => 'prueba', 'description' => 'Ver pantalla de prueba'])->syncRoles([$role1, $role2]);
        /*--------------------------------------------------------------------------------------------------------------------*/
        $permission = Permission::create(['name' => 'simpatizante.index', 
                                        'description' => 'Ver pantalla de Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.create', 
                                        'description' => 'crear Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.store', 
                                        'description' => 'guardar Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.show', 
                                        'description' => 'ver Institucion completo'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.edit', 
                                        'description' => 'ir a editar Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.update', 
                                        'description' => 'actualizar Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.destroy', 
                                        'description' => 'eliminar Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        $permission = Permission::create(['name' => 'simpatizante.deactivate',
                                        'description' => 'desactivar Institucion'])->syncRoles([$role1, $role2, $role3, $role4]);
        /*--------------------------------------------------------------------------------------------------------------------*/
    }
}
