<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AssistenteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ContatoRespostaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\RecuperarSenhaController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;


use App\Models\Contato;
use App\Models\ContatoResposta;
use App\Mail\RespostaEmail;

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
Route::post('/contato/enviar', [HomeController::class, 'salvarNoBanco'])->name('contato.enviar');
Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/carrinho', [ShopController::class, 'carrinho'])->name('carrinho');
Route::get('/shop-detalhes', [ShopController::class, 'shopDetalhes'])->name('shopDetalhes');

#region Login

// Logar
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Autenticação
Route::post('/login', [LoginController::class, 'autenticar'])->name('login.autenticar');
// Recuperar Senha
Route::get('/recuperar-senha', [RecuperarSenhaController::class, 'index'])->name('recuperar-senha.index');
Route::post('/recuperar-senha', [RecuperarSenhaController::class, 'validar'])->name('recuperar-senha.validar');
Route::get('/senha-recuperada', [RecuperarSenhaController::class, 'visualizar-senha'])->name('recuperar-senha.visualizar');



#endregion Login

Route::middleware(['autenticacao:administrador', 'verificar_administrador'])->group(function(){

     Route::get('/dashboard/administrador', [AdministradorController::class, 'index'])->name('dashboard.administrador');

     //Funcionários
     Route::get('/dashboard/administrador/funcionario', [FuncionarioController::class, 'index'])->name('funcionario.index');
     Route::get('/dashboard/administrador/funcionario/create', [FuncionarioController::class, 'create'])->name('funcionario.create');
     Route::post('/dashboard/administrador/funcionario/store', [FuncionarioController::class, 'store'])->name('funcionario.store');
     Route::get('/dashboard/administrador/funcionario/show/{id}', [FuncionarioController::class, 'show'])->name('funcionario.show');
     Route::put('/dashboard/administrador/funcionario/update/{id}', [FuncionarioController::class, 'update'])->name('funcionario.update');


     // Produtos
     Route::get('/dashboard/administrador/produto', [ProdutoController::class, 'index'])->name('produto.index');
     Route::post('/dashboard/administrador/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
     Route::get('/dashboard/administrador/produto/show/{id}', [ProdutoController::class, 'show'])->name('produto.show');
     Route::put('/dashboard/administrador/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');



     // Mensagens
     Route::get('/dashboard/administrador/mensagem', [ContatoController::class, 'index'])->name('contato.index');
     Route::get('/dashboard/administrador/mensagem/show/{id}', [ContatoController::class, 'show'])->name('contato.show');
     Route::put('/dashboard/administrador/mensagem/favoritar/{id}', [ContatoController::class, 'favoritar'])->name('contato.favoritar');
     Route::put('/dashboard/administrador/mensagem/remover/{id}', [ContatoController::class, 'remover'])->name('contato.remover');
     Route::get('/dashboard/administrador/mensagem/verificar-lido/{id}', [ContatoController::class, 'verificarLido'])->name('contato.verificar-lido');
     Route::put('/dashboard/administrador/mensagem/atualizar-lido/{id}', [ContatoController::class, 'atualizarLido'])->name('contato.atualizar-lido');

     // Mensagens / Resposta
     Route::post('/dashboard/administrador/mensagem/responder', [ContatoRespostaController::class, 'enviarResposta'])->name('contato.responder');

    //   Route::get('/dashboard/administrador/mensagem/mail/teste-email', function () {

    //      // Substitua pelo método adequado para buscar um contato existente
    //      $contato = Contato::findOrFail(1); // Aqui, estou assumindo que o contato com ID 1 existe

    //      // Substitua pelo método adequado para buscar uma resposta existente
    //      $resposta = ContatoResposta::findOrFail(1); // Aqui, estou assumindo que a resposta com ID 1 existe
    //     // dd('oi');
    //      return new RespostaEmail($contato, $resposta);
    //  });

     // Perfil
     Route::get('/dashboard/administrador/perfil', [PerfilController::class, 'index'])->name('perfil.index');
     Route::put('/dashboard/administrador/perfil/update/{id}', [PerfilController::class, 'update'])->name('perfil.update');


});


Route::middleware(['autenticacao:assistente'])->group(function (){

    Route::get('/dashboard/assistente', [AssistenteController::class, 'index'])->name('dashboard.assistente');

    Route::get('/dashboard/assistente/mensagem', [AssistenteController::class, 'index'])->name('assistente.contato.index');
    Route::get('/dashboard/assistente/mensagem/show/{id}', [AssistenteController::class, 'show'])->name('assistente.contato.show');
    Route::put('/dashboard/assistente/mensagem/favoritar/{id}', [AssistenteController::class, 'favoritar'])->name('assistente.contato.favoritar');
    Route::put('/dashboard/assistente/mensagem/remover/{id}', [AssistenteController::class, 'remover'])->name('assistente.contato.remover');
    Route::get('/dashboard/assistente/mensagem/verificar-lido/{id}', [AssistenteController::class, 'verificarLido'])->name('assistente.contato.verificar-lido');
    Route::put('/dashboard/assistente/mensagem/atualizar-lido/{id}', [AssistenteController::class, 'atualizarLido'])->name('assistente.contato.atualizar-lido');

    // Mensagens / Resposta
    Route::post('/dashboard/assistente/mensagem/responder', [ContatoRespostaController::class, 'enviarResposta'])->name('assistente.contato.responder');

         // Perfil
    Route::get('/dashboard/assistente/perfil', [AssistenteController::class, 'showPerfil'])->name('assistente.perfil.index');
    Route::put('/dashboard/assistente/perfil/update/{id}', [AssistenteController::class, 'updatePerfil'])->name('assistente.perfil.update');

});

// logout
Route::post('/sair', function(){

    session()->flush();
    return redirect('/login');
})->name('sair');
