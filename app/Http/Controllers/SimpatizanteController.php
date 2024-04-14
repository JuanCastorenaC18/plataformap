<?php

namespace App\Http\Controllers;

use App\Models\Simpatizante;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class SimpatizanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Obtén el objeto del rol 'cooestatal'
         $cooestatalRole = Role::where('name', 'simpatizantes')->first();
         $users = $cooestatalRole->users;
 
        
         // Definir los nombres de los roles que deseas contar
         $rolesToCount = [
             'admin',
             'cooestatal',
             'coomunicipal',
             'coogrupo',
             'responsablered',
             'simpatizantes',
         ];
 
         // Declarar variables para almacenar los recuentos de usuarios por cada rol
         $adminCount = 0;
         $cooestatalCount = 0;
         $coomunicipalCount = 0;
         $coogrupoCount = 0;
         $responsableredCount = 0;
         $simpatizantesCount = 0;
 
         // Iterar sobre cada nombre de rol y contar los usuarios correspondientes
         foreach ($rolesToCount as $roleName) {
             // Obtener el objeto Role por su nombre
             $role = Role::where('name', $roleName)->first();
 
             if ($role) {
                 // Contar el número de usuarios que tienen este rol y asignarlo a la variable correspondiente
                 switch ($roleName) {
                     case 'admin':
                         $adminCount = $role->users()->count();
                         break;
                     case 'cooestatal':
                         $cooestatalCount = $role->users()->count();
                         break;
                     case 'coomunicipal':
                         $coomunicipalCount = $role->users()->count();
                         break;
                     case 'coogrupo':
                         $coogrupoCount = $role->users()->count();
                         break;
                     case 'responsablered':
                         $responsableredCount = $role->users()->count();
                         break;
                     case 'simpatizantes':
                         $simpatizantesCount = $role->users()->count();
                         break;
                     default:
                         break;
                 }
             }
         }
         return view('simpatizante.index', [
             'adminCount' => $adminCount,
             'cooestatalCount' => $cooestatalCount,
             'coomunicipalCount' => $coomunicipalCount,
             'coogrupoCount' => $coogrupoCount,
             'responsableredCount' => $responsableredCount,
             'simpatizantesCount' => $simpatizantesCount,
         ], compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtén el objeto del rol 'cooestatal'
        $cooestatalRole = Role::where('name', 'coomunicipal')->first();
        $users = $cooestatalRole->users;

       
        // Definir los nombres de los roles que deseas contar
        $rolesToCount = [
            'admin',
            'cooestatal',
            'coomunicipal',
            'coogrupo',
            'responsablered',
            'simpatizantes',
        ];

        // Declarar variables para almacenar los recuentos de usuarios por cada rol
        $adminCount = 0;
        $cooestatalCount = 0;
        $coomunicipalCount = 0;
        $coogrupoCount = 0;
        $responsableredCount = 0;
        $simpatizantesCount = 0;

        // Iterar sobre cada nombre de rol y contar los usuarios correspondientes
        foreach ($rolesToCount as $roleName) {
            // Obtener el objeto Role por su nombre
            $role = Role::where('name', $roleName)->first();

            if ($role) {
                // Contar el número de usuarios que tienen este rol y asignarlo a la variable correspondiente
                switch ($roleName) {
                    case 'admin':
                        $adminCount = $role->users()->count();
                        break;
                    case 'cooestatal':
                        $cooestatalCount = $role->users()->count();
                        break;
                    case 'coomunicipal':
                        $coomunicipalCount = $role->users()->count();
                        break;
                    case 'coogrupo':
                        $coogrupoCount = $role->users()->count();
                        break;
                    case 'responsablered':
                        $responsableredCount = $role->users()->count();
                        break;
                    case 'simpatizantes':
                        $simpatizantesCount = $role->users()->count();
                        break;
                    default:
                        break;
                }
            }
        }
        return view('simpatizante.create', [
            'adminCount' => $adminCount,
            'cooestatalCount' => $cooestatalCount,
            'coomunicipalCount' => $coomunicipalCount,
            'coogrupoCount' => $coogrupoCount,
            'responsableredCount' => $responsableredCount,
            'simpatizantesCount' => $simpatizantesCount,
        ], compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $user->nombre = $request->input('nombre');
            $user->apellido_paterno = $request->input('apellido_paterno');
            $user->apellido_materno = $request->input('apellido_materno');
            $user->name = $request->input('apellido_paterno') . ' ' . $request->input('apellido_materno') . ' ' . $request->input('nombre');
            $user->usuario = $request->input('usuario');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->helperpass = $request->input('password');
            $user->assignRole('SIMPATIZANTES');

            // Completa con el resto de los campos de 'users'
            $user->save();
            $userId = Auth::id();
            $userDetail = new UserDetail();
            $userDetail->user_id = $user->id;
            $userDetail->fecha_nacimiento = $request->input('fecha_nacimiento');
            $userDetail->sexo = $request->input('sexo');
            $userDetail->fecha_alta = $request->input('fecha_alta');
            $userDetail->ocupacion = $request->input('ocupacion');
            $userDetail->tel_celular = $request->input('tel_celular');
            $userDetail->tel_particular = $request->input('tel_particular');
            $userDetail->email = $request->input('email');
            $userDetail->facebook = $request->input('facebook');
            $userDetail->twitter = $request->input('twitter');
            $userDetail->informacion = $request->input('informacion');
            $userDetail->calle = $request->input('calle');
            $userDetail->municipio = $request->input('municipio');
            $userDetail->seccion = $request->input('seccion');
            $userDetail->num = $request->input('num');
            $userDetail->int = $request->input('int');
            $userDetail->codigo_postal = $request->input('codigo_postal');
            $userDetail->colonia = $request->input('colonia');
            $userDetail->clave = $request->input('clave');
            $userDetail->coordinador_id = $userId;
            // Completa con el resto de los campos de 'user_details'
            $userDetail->save();

            DB::commit();

            return redirect()->route('registro')->with('Exito', 'Usuario registrado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Hubo un error al registrar el usuario. Por favor, intenta de nuevo.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
