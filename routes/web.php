<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AtendenteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');

Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/carrinho', [ShopController::class, 'carrinho'])->name('carrinho');

Route::get('/shop-detalhes', [ShopController::class, 'shopDetalhes'])->name('shopDetalhes');

#region Login

// Logar
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Autenticação
Route::post('/login', [LoginController::class, 'autenticar'])->name('login.autenticar');

#endregion Login

Route::middleware(['autenticacao:administrador'])->group(function(){

     Route::get('/dashboard/administrador', [AdministradorController::class, 'index'])->name('dashboard.administrador');

});

Route::middleware(['autenticacao:atendente'])->group(function (){

    Route::get('dashboard/atendente', [AtendenteController::class, 'index'])->name('dashboard.atendente');

});

