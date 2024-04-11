<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'ADMIN']);
        $role2 = Role::create(['name' => 'COOESTATAL']);
        $role2 = Role::create(['name' => 'COOMUNICIPAL']);
        $role3 = Role::create(['name' => 'COOGRUPO']);
        $role4 = Role::create(['name' => 'RESPONSABLERED']);
        $role5 = Role::create(['name' => 'SIMPATIZANTES']);
    }
}
