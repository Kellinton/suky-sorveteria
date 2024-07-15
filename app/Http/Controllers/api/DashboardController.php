<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Funcionario;
use App\Models\Contato;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($idFuncionario)
    {
        // Buscar os dados do funcionário
        $funcionario = Funcionario::findOrFail($idFuncionario);

        $tipoFuncionario = ucfirst($funcionario->tipo_funcionario);


        $fotoUrl = asset('storage/img/funcionarios/' . $funcionario->fotoFuncionario);

        // Quantidade valor em produtos
        $totalValorProdutos = Produto::sum('valorProduto');

        // Formatar o valor como moeda
        $totalValorProdutos = number_format($totalValorProdutos, 2, ',', '.');

        // Produtos Totais
        $totalProdutos = Produto::count();

        // Funcionários Totais
        $totalFuncionarios = Funcionario::count();

        $funcionariosRecentes = Funcionario::orderBy('updated_at', 'desc')
        ->take(3)
        ->get()
        ->map(function ($funcionario) {
            return [
                'nomeFuncionario' => $funcionario->nomeFuncionario,
                'sobrenomeFuncionario' => $funcionario->sobrenomeFuncionario,
                'fotoFuncionario' => $funcionario->fotoFuncionario,
                'cargoFuncionario' => ucfirst($funcionario->cargoFuncionario),
                'tipo_funcionario' => ucfirst($funcionario->tipo_funcionario),
                'statusFuncionario' => ucfirst($funcionario->statusFuncionario),
            ];
        });
        $produtosRecentes = Produto::orderBy('updated_at', 'desc')
        ->take(3)
        ->get()
        ->map(function ($produto) {
            return [
                'nomeProduto' => $produto->nomeProduto,
                'descricaoProduto' => $produto->descricaoProduto,
                'categoriaProduto' => $produto->categoriaProduto,
                'valorProduto' => $produto->valorProduto,
                'fotoProduto' => $produto->fotoProduto,
                'statusProduto' => $produto->statusProduto,
            ];
        });


        return response()->json([
            'dadosFuncionario' => [
                'nome_funcionario' => $funcionario->nomeFuncionario,
                'sobrenome_funcionario' => $funcionario->sobrenomeFuncionario,
                'foto_funcionario' => $fotoUrl,
                'tipo_funcionario' => $tipoFuncionario,
            ],
            'funcionariosRecentes' => $funcionariosRecentes,
            'produtosRecentes'  => $produtosRecentes,
            'totalValorProdutos' => $totalValorProdutos,
            'totalProdutos' => $totalProdutos,
            'totalFuncionarios' => $totalFuncionarios,
        ], 200);
    }
}
