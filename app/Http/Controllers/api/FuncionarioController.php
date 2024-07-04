<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
        ->select('funcionarios.*', 'usuarios.email')
        ->orderBy('funcionarios.updated_at', 'desc')
        ->get();

        $totalFuncionarios = Funcionario::count();

        $mediaSalarial = Funcionario::avg('salarioFuncionario');

        $mediaSalarial = number_format($mediaSalarial, 2, ',', '.');

        $funcionariosInativos = Funcionario::where('statusFuncionario', 'inativo')->count();

        return response()->json([
            'funcionarios' => $funcionarios,
            'totalFuncionarios' => $totalFuncionarios,
            'mediaSalarial' => $mediaSalarial,
            'funcionariosInativos' => $funcionariosInativos,
        ]);
    }

}
