<?php

use App\Http\Controllers\AdministradorController;
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

Route::apiResource('administrador', 'App\Http\Controllers\AdministradorController');

Route::post('login', [AdministradorController::class, 'login']);

Route::middleware(['auth:sanctum', 'administrador'])->group(function() {
    Route::apiResource('administrador', AdministradorController::class);
    Route::get('/administrador/{id}/menu', [AdministradorController::class, 'getMenu']);
    Route::get('/administrador/{id}/funcionario', [AdministradorController::class, 'getFuncionario']);
    Route::get('/administrador/{id}/estoque', [AdministradorController::class, 'getEstoque']);
 });
