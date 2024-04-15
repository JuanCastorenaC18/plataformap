<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

use App\Models\Simpatizante;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class MunicipalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:municipal.index')->only('index');
        $this->middleware('can:municipal.create')->only('create');
        $this->middleware('can:municipal.store')->only('store');
        $this->middleware('can:municipal.show')->only('show');
        $this->middleware('can:municipal.edit')->only('edit');
        $this->middleware('can:municipal.update')->only('update');
        $this->middleware('can:municipal.destroy')->only('destroy');
        $this->middleware('can:municipal.deactivate')->only('deactivate');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Obtén el objeto del rol 'cooestatal'
         $cooestatalRole = Role::where('name', 'coomunicipal')->first();
         $users = $cooestatalRole->users;

         // Obtén los detalles de cada usuario
        $usersWithDetails = [];
        foreach ($users as $user) {
            $details = UserDetail::where('user_id', $user->id)->first();
            $usersWithDetails[] = [
                'user' => $user,
                'details' => $details
            ];
        }
        $coordinadores = [];
        foreach ($usersWithDetails as $userData) {
            $coordinadorId = $userData['details']->coordinador_id;
            $coordinador = User::find($coordinadorId); // Suponiendo que 'User' es el modelo de tu tabla de usuarios
            $coordinadores[$coordinadorId] = $coordinador->name;
        }
 
        
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
         return view('municipal.index', [
             'adminCount' => $adminCount,
             'cooestatalCount' => $cooestatalCount,
             'coomunicipalCount' => $coomunicipalCount,
             'coogrupoCount' => $coogrupoCount,
             'responsableredCount' => $responsableredCount,
             'simpatizantesCount' => $simpatizantesCount,
             'usersWithDetails' => $usersWithDetails,
             'coordinadores' => $coordinadores,
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
        return view('municipal.create', [
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
            $user->assignRole('COOMUNICIPAL');

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
    public function update(Request $request, User $user): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Actualizar los datos del usuario
            $user->update([
                'nombre' => $request->input('nombre'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'name' => $request->input('apellido_paterno') . ' ' . $request->input('apellido_materno') . ' ' . $request->input('nombre'),
                'usuario' => $request->input('usuario'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), // Opcional: solo si se actualiza la contraseña
                'helperpass' => $request->input('password') // Opcional: solo si se actualiza la contraseña
            ]);

            // Actualizar los detalles del usuario
            $userDetail = UserDetail::where('user_id', $user->id)->first();
            if ($userDetail) {
                $userDetail->update([
                    'fecha_nacimiento' => $request->input('fecha_nacimiento'),
                    'sexo' => $request->input('sexo'),
                    'fecha_alta' => $request->input('fecha_alta'),
                    'ocupacion' => $request->input('ocupacion'),
                    'tel_celular' => $request->input('tel_celular'),
                    'tel_particular' => $request->input('tel_particular'),
                    'email' => $request->input('email'),
                    'facebook' => $request->input('facebook'),
                    'twitter' => $request->input('twitter'),
                    'informacion' => $request->input('informacion'),
                    'calle' => $request->input('calle'),
                    'municipio' => $request->input('municipio'),
                    'seccion' => $request->input('seccion'),
                    'num' => $request->input('num'),
                    'int' => $request->input('int'),
                    'codigo_postal' => $request->input('codigo_postal'),
                    'colonia' => $request->input('colonia'),
                    'clave' => $request->input('clave')
                ]);
            }

            DB::commit();

            return redirect()->route('municipal.index')->with('Exito', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Hubo un error al actualizar el usuario. Por favor, intenta de nuevo.']);
        }
    }

    
    public function destroy($id): RedirectResponse
    {
        DB::beginTransaction();

        try {
            // Buscar y eliminar los detalles del usuario
            $userDetail = UserDetail::where('user_id', $id)->first();
            if ($userDetail) {
                $userDetail->delete();
            }

            // Buscar y eliminar el usuario
            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();

            return redirect()->route('municipal.index')->with('Exito', 'Usuario eliminado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return back()->withErrors(['error' => 'Hubo un error al eliminar el usuario. Por favor, intenta de nuevo.']);
        }
    }
}
