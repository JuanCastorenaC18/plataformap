<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\Simpatizante;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nombre' => 'Alberto',
            'apellido_paterno' => 'Miguel',
            'apellido_materno' => 'Cruz',
            'name' => 'Alberto Miguel Cruz',
            'email' => 'betomiguel2930@gmail.com',
            'usuario' => 'usuario01',
            'password' => Hash::make('mnestatal10'),
            'helperpass' => 'mnestatal10',
            'status' => true,
            'process' => true,
            'remember_token' => '',
        ])->assignRole('COOESTATAL');

        // Crear detalles del usuario
        UserDetail::create([
            'user_id' => $user->id,
            'fecha_nacimiento' => Carbon::parse('1980-04-01'),
            'sexo' => 'Hombre',
            'fecha_alta' => '10/04/2024',
            'ocupacion' => 'Desarrollador de Software',
            'tel_celular' => '8715168143',
            'tel_particular' => '8714508665',
            'email' => 'betomiguel2930@gmail.com',
            'facebook' => 'Alberto Miguel',
            'twitter' => '@Alberto_Miguel',
            'informacion' => 'ingeniero agronomo',
            'calle' => 'Calle 123',
            'municipio' => 'Torreón',
            'seccion' => '1234',
            'num' => '1500',
            'codigo_postal' => '27297',
            'colonia' => 'Zaragoza Sur',
            'clave' => '05PSU0090Q12',
        ]);
    }
}
