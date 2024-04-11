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
            'nombre' => 'Juan Jose',
            'apellido_paterno' => 'De La Cruz',
            'apellido_materno' => 'Castorena',
            'name' => 'Juan Jose De La Cruz Castorena',
            'email' => 'juancruzcastorena18@gmail.com',
            'usuario' => 'usuario01',
            'password' => Hash::make('Juan1812'),
            'helperpass' => 'Juan1812',
            'status' => true,
            'process' => true,
            'remember_token' => '',
        ])->assignRole('COOESTATAL');

        // Crear detalles del usuario
        UserDetail::create([
            'user_id' => $user->id,
            'fecha_nacimiento' => Carbon::parse('2001-12-18'),
            'sexo' => 'Hombre',
            'fecha_alta' => '10/04/2024',
            'ocupacion' => 'Desarrollador de Software',
            'tel_celular' => '8715168143',
            'tel_particular' => '8714508665',
            'email' => 'juancruzcastorena18@gmail.com',
            'facebook' => 'juancruz',
            'twitter' => '@juancruz',
            'informacion' => 'Soy un desarrollador de software',
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
