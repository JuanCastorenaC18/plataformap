<?php

namespace App\Http\Controllers;

use App\Models\Simpatizante;
use App\Models\U;
use Illuminate\Http\Request;

class SimpatizanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Verificar si el usuario ya existe por su email
            $existingUser = User::where('email', $request->input('email'))->first();

            if ($existingUser) {
                return back()->withInput()->withErrors(['error' => 'El usuario ya está registrado con este correo electrónico.']);
            }

            // Crear un nuevo usuario en la tabla 'users'
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
            $user->save();

            // Crear detalles del usuario en la tabla 'user_detail'
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
            $userDetail->coordinador_id = Auth::id();
            $userDetail->save();

            DB::commit();

            return redirect()->route('simpatizante.index')->with('Exito', 'Usuario registrado correctamente.');
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
