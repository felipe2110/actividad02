<?php

use App\Http\Controllers\aprendicesController;
use App\Http\Controllers\guiasController;
use App\Http\Controllers\guiasxusuarioController;
use App\Models\guiasxusuarios;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:instructor|aprendiz'])->group(function () {
        Route::resource('guias', guiasController::class);
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:instructor'])->group(function () {
        Route::resource('aprendices', aprendicesController::class);
    });
});
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:instructor'])->group(function () {

        Route::get('asignar-guias/asignarGuiaUsuario/{id}', [guiasxusuarioController::class, 'asignarGuiaUsuario'])->name('asignar-guias.asignarGuiaUsuario');
        Route::post('asignar-guias',[guiasxusuarioController::class,'storeAsignarGuiaUsuario'])->name('asignar-guias.storeAsignarGuiaUsuario');

        Route::get('asignar-guias/asignarGuiaFicha', [guiasxusuarioController::class, 'asignarGuiaFicha'])->name('asignar-guias.asignarGuiaFicha');
        Route::post('asignar-guias-ficha', [guiasxusuarioController::class, 'guardarAsignarGuiaFicha'])->name('asignar-guias.guardarAsignarGuiaFicha');
    });
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::middleware(['role:aprendiz'])->group(function () {
        Route::get('Mis-guias/{id}', [guiasxusuarioController::class, 'index'])->name('Mis-guias.index');
    });
});
