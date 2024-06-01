<?php

use App\Http\Controllers\EstatalController;
use App\Http\Controllers\MunicipalController;
use App\Http\Controllers\RedController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\SimpatizanteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VotoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
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

    // Pasar las variables de recuento de usuarios por rol a la vista 'dashboard'
    return view('dashboard', [
        'adminCount' => $adminCount,
        'cooestatalCount' => $cooestatalCount,
        'coomunicipalCount' => $coomunicipalCount,
        'coogrupoCount' => $coogrupoCount,
        'responsableredCount' => $responsableredCount,
        'simpatizantesCount' => $simpatizantesCount,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registro', function () {
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
    return view('registro', [
        'adminCount' => $adminCount,
        'cooestatalCount' => $cooestatalCount,
        'coomunicipalCount' => $coomunicipalCount,
        'coogrupoCount' => $coogrupoCount,
        'responsableredCount' => $responsableredCount,
        'simpatizantesCount' => $simpatizantesCount,
    ]);
})->middleware(['auth', 'verified'])->name('registro');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*Simpatizante*/
Route::resource('simpatizante', SimpatizanteController::class)->names(['simpatizante']);
Route::resource('estatal', EstatalController::class)->names(['estatal']);
Route::resource('municipal', MunicipalController::class)->names(['municipal']);
Route::resource('responsable-red', RedController::class)->names(['responsable-red']);
Route::resource('grupo', GrupoController::class)->names(['grupo']);
Route::resource('voto', VotoController::class)->names(['voto']);


