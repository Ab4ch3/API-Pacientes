<?php

use App\Http\Controllers\API\PacienteController;
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
Route::get('pacientes',[PacienteController::class,'index']); 