<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\InscripcionesController;

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

Route::get('constancia-medica', [ConstanciaController::class, 'constanciaMedica']);
Route::get('/constancia-vocacional/{codigo}/{nota}', [MedicoController::class, 'constanciaVocacional']);
Route::get('/constancia-inscripcion/{dni}',[InscripcionesController::class, 'constanciaInscripcion']);

Route::get('/constancia-inscripcion2/{dni}',[InscripcionesController::class, 'constanciaInscripcion2']);

Route::get('/ingresantes-cepre/{dni}',[InscripcionesController::class, 'constanciaIngresante']);

Route::get('/get-puntaje', [InscripcionesController::class, 'getPuntaje']);