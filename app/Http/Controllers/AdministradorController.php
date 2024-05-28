<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Contato;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdministradorController extends Controller
{
    public function __construct()
    {
        // Configura o locale para português do Brasil em todo o controlador
        Carbon::setLocale('pt_BR');

        // Timezone de Brasília
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index(){
        //recuperando o id do funcionario da sessão
         $id = session('id');

         // recuperando os dados do funcionário autenticado
         $funcionarioAutenticado = Funcionario::find($id);

        //dd($funcionarioAutenticado);

         if (!$funcionarioAutenticado) {
            abort(404, 'Funcionario não encontrado!');
         }

         // Quantidade valor em produtos
         $totalValorProdutos = Produto::sum('valorProduto');

         // Quantidade de Funcionários
         $totalFuncionarios = Funcionario::count();


         $produtos = Produto::orderBy('id', 'desc')->take(4)->get();

         $contatos = Contato::orderBy('id', 'desc')->take(6)->get();

         return view('dashboard.administrador.index', compact(
            'funcionarioAutenticado', 'totalValorProdutos', 'totalFuncionarios', 'produtos', 'contatos'
        ));

    }
}
