<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Funcionario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($idFuncionario)
    {
        // Buscar os dados do funcionário
        $funcionario = Funcionario::findOrFail($idFuncionario); // Ajuste se estiver utilizando outro método

        $tipoFuncionario = ucfirst($funcionario->tipo_funcionario);

        $fotoUrl = asset('img/funcionarios/' . $funcionario->fotoFuncionario);

        return response()->json([
            'dadosFuncionario' => [
                'nome_funcionario' => $funcionario->nomeFuncionario,
                'sobrenome_funcionario' => $funcionario->sobrenomeFuncionario,
                'foto_funcionario' => $fotoUrl,
                'tipo_funcionario' => $tipoFuncionario,
            ]
        ]);
    }
}
