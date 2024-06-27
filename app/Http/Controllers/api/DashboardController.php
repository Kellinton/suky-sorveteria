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


        $fotoUrl = asset('img/funcionarios/' . $funcionario->fotoFuncionario);

        // Quantidade valor em produtos
        $totalValorProdutos = Produto::sum('valorProduto');

        // Formatar o valor como moeda
        $totalValorProdutos = number_format($totalValorProdutos, 2, ',', '.');

        // Produtos Totais
        $totalProdutos = Produto::count();

        // Funcionários Totais
        $totalFuncionarios = Funcionario::count();

        // Buscar as 3 mensagens mais recentes
        $mensagensRecentes = Contato::orderBy('created_at', 'desc')->take(3)->get();

        // Formatar as mensagens e datas
        $mensagensRecentes = $mensagensRecentes->map(function($mensagem) {
            return [
                'nomeContato' => $mensagem->nomeContato,
                'mensagemContato' => Str::limit($mensagem->mensagemContato, 25, '...'),
                'created_at' => Carbon::parse($mensagem->created_at)->diffForHumans(),
            ];
        });


        return response()->json([
            'dadosFuncionario' => [
                'nome_funcionario' => $funcionario->nomeFuncionario,
                'sobrenome_funcionario' => $funcionario->sobrenomeFuncionario,
                'foto_funcionario' => $fotoUrl,
                'tipo_funcionario' => $tipoFuncionario,
            ],
            'totalValorProdutos' => $totalValorProdutos,
            'totalProdutos' => $totalProdutos,
            'totalFuncionarios' => $totalFuncionarios,
            'mensagensRecentes' => $mensagensRecentes,

        ]);
    }
}
