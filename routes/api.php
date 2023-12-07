<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PagoFacilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/endpoint', [PagoFacilController::class, 'metodo']);
Route::post('/endpoint', [PagoFacilController::class, 'otroMetodo']);
Route::post('/RecolectarDatos', [PagoFacilController::class, 'recolectarDatos']);
Route::get('/ConsultarEstado', [PagoFacilController::class, 'ConsultarEstado']);
Route::post('/SendCorreo', [PagoFacilController::class, 'SendCorreo']);

// auth jwt
Route::post('/login', [AuthController::class, 'login']);
Route::post('/registers', [AuthController::class, 'register']);

// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'

// ], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });

Route::middleware('auth:api')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
});