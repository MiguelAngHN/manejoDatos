<?php

use App\Http\Controllers\ElementoController;
use App\Http\Controllers\estadoElementoController;
use App\Http\Controllers\IngresoSalidaEquipoController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('elementos', ElementoController::class);
Route::resource('estado_elementos', estadoElementoController::class);

Route::get('elementos/{id}/detalles', [ElementoController::class, 'detalles'])->name('elementos.detalles');
Route::get('elemento/viewpdf/{id}', [ElementoController::class, 'viewpdf'])->name('elemento.viewpdf');

Route::resource('ingreso_salida_equipos', IngresoSalidaEquipoController::class)->only(['index', 'create', 'store']);
