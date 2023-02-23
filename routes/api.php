<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\ConstanciaController;
use App\Http\Controllers\ColegioController;
use App\Http\Controllers\ApoderadoController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SelectDataController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\ComprobanteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth', 'verificador'])->group(function () {
    Route::get('test', function(){
        return "Lograst entrar como verificador";
    });
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//MEDICO
Route::post('/guardar-constancia', [MedicoController::class, 'guardar']);
Route::get('/guardar-constancias', [MedicoController::class, 'generPDFS']);
Route::get('/constancia-vocacional/{codigo}/{dni}/{nombre}', [MedicoController::class, 'constanciaVocacional']);

Route::get('/constancia-vocacional2/{codigo}/{dni}/{nombre}', [MedicoController::class, 'constanciaVocacional']);
Route::get('/constancia-inscripcion/{dni}',[InscripcionesController::class, 'constanciaInscripcion']);
Route::get('/constancia-pre-inscripcion/{dni}',[PreIsncripcionController::class, 'constanciaPreInscripcion']);

Route::get('/constancia-pre-inscripcion-general/{dni}',[PreIsncripcionController::class, 'constanciaPreInscripcion2']);


Route::get('/generar-constancias', [MedicoController::class, 'genConstancias2']);


//VOUCHER
Route::post('/actualizar-voucher', [ComprobanteController::class, 'actualizar']);


//POSTULANTE
Route::resource('/postulante', PostulanteController::class);
Route::post('/get-postulantes', [PostulanteController::class, 'getPostulantes']);
Route::get('/deletePostulante/{id}', [PostulanteController::class, 'destroy']);
Route::post('/modificarPostulante', [PostulanteController::class, 'update']);
Route::get('/get-postulante-dni/{dni}', [PostulanteController::class, 'getPostulanteDdni']);

//COLEGIOS
Route::resource('/colegio', ColegioController::class);
Route::post('/getColegios', [ColegioController::class, 'getColegios']);
Route::get('/deleteColegio/{id}', [ColegioController::class, 'destroy']);
Route::post('/modificarColegio', [ColegioController::class, 'update']);

//APODERADOS
Route::resource('/apoderado', ApoderadoController::class);
Route::post('/getApoderados', [ApoderadoController::class, 'getApoderados']);
Route::get('/deleteApoderado/{id}', [ApoderadoController::class, 'destroy']);
Route::post('/modificarApoderado', [ApoderadoController::class, 'update']);

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register']);
    // Route::group(['middleware' => 'auth:api'], function () {
    //     
    //     Route::get('user', [AuthController::class, 'user']);
    // });

    Route::middleware('auth:sanctum')->group( function () {
        Route::get('logout', [AuthController::class, 'logout']);
    });


    Route::post('login', [AuthController::class, 'loginUser'])->name('login');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('user', [AuthController::class, 'user']);
});

Route::post('/getApoderados', [ApoderadoController::class, 'getApoderados']);
Route::get('/deleteApoderado/{id}', [ApoderadoController::class, 'destroy']);
Route::post('/modificarApoderado', [ApoderadoController::class, 'update']);

Route::controller(SelectDataController::class)->name('select-data.')->prefix('select-data')->group(function () {
    Route::get('/get-paises', 'getPaises')->name('get-paises');
    Route::get('/get-colegios/{ubigeo}', 'getColegiosPorUbigeo')->name('get-colegios');
    Route::get('/get-departamentos', 'getDepartamentos')->name('get-departamentos');
    Route::get('/get-provincias/{departamento}', 'getProvinciasPorDepartamento')->name('get-provincias');
    Route::get('/get-distritos/{provincia}', 'getDistritosPorProvincia')->name('get-distritos');
    Route::get('/get-programa-estudios', 'getProgramaDeEstudios')->name('get-programa-estudios');
});


Route::post('/guardar-temp', [ConstanciaController::class, 'guardarTemp'])->name('guardar-temp');
Route::post('/eliminar-temp', [ConstanciaController::class, 'eliminarTemp'])->name('eliminar-temp');
//TEMPORAL

Route::post('/pre-inscripcion/guardar', [PreIsncripcionController::class, 'guardarPreInscripcion']);
Route::post('/get-constancias-medicas', [ConstanciaController::class, 'getCosntancias'])->name('get-constancias');
Route::get('/get-codigo', [PreIsncripcionController::class, 'getCodigo'])->name('get-codigo');
Route::post('/validar-datos', [PreIsncripcionController::class, 'validarPasoUno'])->name('validar-datos');
Route::get('/   ', [PreIsncripcionController::class, 'getCodigo'])->name('get-codigo');
Route::get('/iniciar-pre-inscripcion/{dni}', [PreIsncripcionController::class, 'iniciarPreInscripcion'])->name('iniciar-pre-inscripcion');

//** INSCRIPCIONES ****/
Route::get('/ver-inscritos/{dni}', [InscripcionesController::class, 'getInscritos']);

Route::group(['middleware' => ['cors']], function () {
    Route::post('/auth/register', [AuthController::class, 'createUser']);
    Route::post('/auth/login', [AuthController::class, 'loginUser']);
});

// Route::group(['middleware' => ['cors']], function () {
//     Route::post('/auth/register', [AuthController::class, 'createUser']);
//     Route::post('/auth/login', [AuthController::class, 'loginUser']);
// });

//Route::post('/qauth/logout', [AuthController::class, 'logout']);

Route::get('/preguntas/{id}', [PreguntaController::class, 'getPreguntasPrograma']);
Route::post('/guardar-examen', [PreguntaController::class, 'guardarExamen']);


Route::post('/validar', [InscripcionesController::class, 'inscribir']);
Route::post('/postulantes-inscritos', [InscripcionesController::class, 'getPostulantesInscritos']);
Route::get('/postulantes-inscritos/{dni}', [InscripcionesController::class, 'getPostulantesInscritosDni']);

//getPostulantesInscritosDn