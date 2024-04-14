<?php

namespace App\Http\Controllers;

use App\Models\Simpatizante;
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
        // Validar los datos del formulario
        $request->validate([
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'nombres' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|in:hombre,mujer', // Suponiendo que 'sexo' solo puede ser 'M' o 'F'
            'fecha_alta' => 'nullable|date',
            'ocupacion' => 'nullable|string|max:255',
            'tel_celular' => 'nullable|string|max:20',
            'tel_particular' => 'nullable|string|max:20',
            'email' => 'nullable|string|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'informacion' => 'nullable|string',
            'calle' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:255',
            'seccion' => 'nullable|string|max:10',
            'num' => 'nullable|string|max:10',
            'int' => 'nullable|string|max:10',
            'codigo_postal' => 'nullable|string|max:10',
            'colonia' => 'nullable|string|max:255',
            'clave' => 'nullable|string|max:255',
            'usuario' => 'nullable|string|max:255',
            'password' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:255',
            'process' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo Simpatizante con los datos validados
        $simpatizante = new Simpatizante($request->all());

        // Guardar el nuevo Simpatizante en la base de datos
        $simpatizante->save();

        // Redireccionar a una ruta después de guardar
        return redirect()->route('simpatizantes.index')
            ->with('success', 'Simpatizante creado exitosamente.');
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
