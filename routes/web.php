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

Route::get('/constancia-inscripcion',[InscripcionesController::class, 'constanciaInscripcion']);