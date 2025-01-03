<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TerceroController;
use App\Http\Controllers\API\ElementosListasController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('tercero')->group(function () {
    Route::get('/',[ TerceroController::class, 'getAll']);
    Route::post('/',[ TerceroController::class, 'create']);
    Route::delete('/{id}',[ TerceroController::class, 'delete']);
    Route::get('/{id}',[ TerceroController::class, 'get']);
    Route::put('/{id}',[ TerceroController::class, 'update']);
});

Route::prefix('elementosListas')->group(function () {
    Route::get('/getTipoIdentificacion',[ ElementosListasController::class, 'getTipoIdentificacion']);
    Route::get('/getTipoTercero',[ ElementosListasController::class, 'getTipoTercero']);
    Route::get('/getDepartamento',[ ElementosListasController::class, 'getDepartamento']);
    Route::get('/getCiudad',[ ElementosListasController::class, 'getCiudad']);
    Route::get('/getTipoContribuyente',[ ElementosListasController::class, 'getTipoContribuyente']);
});
