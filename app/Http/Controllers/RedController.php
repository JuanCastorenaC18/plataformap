<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén el objeto del rol 'cooestatal'
        $cooestatalRole = Role::where('name', 'responsablered')->first();
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
        return view('red.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
