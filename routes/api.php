<?php

use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\ProdutoController;
use App\Http\Controllers\api\ContatoController;
use App\Http\Controllers\api\FuncionarioController;
use App\Http\Controllers\api\PerfilController;
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
    Route::post('/produtos', [ProdutoController::class, 'store']);
    Route::get('/produtos/{id}', [ProdutoController::class, 'show']);
    Route::post('/produtos/{id}', [ProdutoController::class, 'update']);
    Route::get('/produtos', [ProdutoController::class, 'index']);

    // Mensagens
    Route::get('/contatos', [ContatoController::class, 'index']);
    Route::get('/contatos/{id}', [ContatoController::class, 'show']);

    // Funcionarios
    Route::get('/funcionarios', [FuncionarioController::class, 'index']);
    Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show']);
    Route::post('/funcionarios/{id}', [FuncionarioController::class, 'update']);

    // Perfil
    Route::get('/perfil/{id}', [PerfilController::class, 'show']);
    Route::post('/perfil/{id}', [PerfilController::class, 'update']);
 });
