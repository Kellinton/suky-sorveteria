<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\ProdutoController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::post('login', [LoginController::class, 'login']);


 Route::middleware(['auth:sanctum', 'funcionario'])->group(function() {

    // Dashboard
    Route::get('/dashboard/{idFuncionario}', [DashboardController::class, 'index']);

     // Produtos
     Route::get('/produtos', [ProdutoController::class, 'index']);
     Route::post('/produtos', [ProdutoController::class, 'store']);
     Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
     Route::put('/produtos/{id}', [ProdutoController::class, 'update']);
});
