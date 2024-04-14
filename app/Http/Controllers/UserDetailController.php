<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDetailController extends Controller
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
        // Validar los datos del formulario
        $request->validate([
            'apellido_paterno',
            'apellido_materno',
            'nombres',
            'fecha_nacimiento',
            'sexo', // Suponiendo que 'sexo' solo puede ser 'M' o 'F'
            'fecha_alta',
            'ocupacion',
            'tel_celular',
            'tel_particular',
            'email',
            'facebook',
            'twitter',
            'informacion',
            'calle',
            'municipio',
            'seccion',
            'num',
            'int',
            'codigo_postal',
            'colonia',
            'clave',
            'usuario',
            'password',
        ]);

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
