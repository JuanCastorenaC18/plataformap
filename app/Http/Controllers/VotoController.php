<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Voto;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

use App\Models\Simpatizante;
use App\Models\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class VotoController extends Controller
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
    public function update(Request $request, $userId)
    {
        try {
            // Encuentra los documentos del usuario
            $votos = Voto::where('user_id', $userId)->firstOrFail();

            // Actualizar los documentos del usuario
            $votos->update([
                'voto' => $request->has('voto'),
                'status' => $request->has('status'),
                'process' => $request->has('process'),
                'statusjr' => $request->has('statusjr'),
            ]);
            return redirect()->route('docs.index')->with('success', 'Document status updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating document status');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
