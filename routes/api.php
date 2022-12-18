<?php

use App\Http\Controllers\API\PacienteController;
use App\Http\Controllers\AutenticarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Aqui difinimos la ruta 
//Las rutas van definidad por el nombre de la ruta , controlador , y la funcion que ejecutara
// esto es igual a localhost/pacientes/
// Route::get('pacientes',[PacienteController::class,'index']); 
// Route::post('pacientes',[PacienteController::class,'store']); 
// Route::get('pacientes/{paciente}',[PacienteController::class,'show']); 
// Route::put('pacientes/{paciente}',[PacienteController::class,'update']); 
// Route::delete('pacientes/{paciente}',[PacienteController::class,'destroy']); 


// Rutas libres Rutas protegidas
Route::post('registro', [AutenticarController::class,'registro']);
Route::post('login', [AutenticarController::class,'login']);

// Esto se realiza porque el usuario ya tiene el token entonces solo puede acceder a estar ruta si ya tiene el token asociado
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::post('logout', [AutenticarController::class,'logout']);
    // Manera de simplificar las rutas de arriba  , metieda dentro del grupo sanctum solo nos dejara acceder a estar rutas cuando tengamos el token  creado
    Route::apiResource('pacientes', PacienteController::class);
});



