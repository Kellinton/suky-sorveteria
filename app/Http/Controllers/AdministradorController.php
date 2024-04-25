<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index(){
        //recuperando o id do funcionario da sessão
        // $id = session('id');
        // $funcionario = Funcionario::find($id);
        // dd($id);
        // if (!$funcionario) {
        //     abort(404, 'Funcionario não encontrado!');
        // }

        // Recuperar o usuário autenticado
        // Buscar o usuário pelo ID
        // Recuperar o ID do usuário autenticado
        $userId = auth()->id();
        $usuario = Usuario::find($userId);

        // Verificar se o usuário tem um funcionário associado
        if ($usuario->tipo_usuario instanceof \App\Models\Funcionario) {

            $funcionario = $usuario->funcionario;

            $nome = $funcionario->nomeFuncionario;
            $sobrenome = $funcionario->sobrenomeFuncionario;
            $cargo = $funcionario->cargoFuncionario;
        }

        return view('dashboard.administrador.index', compact('nomeFuncionario',
         'sobrenomeFuncionario',
          'cargoFuncionario',
        'tipoFuncionario'));
        // return view('dashboard.administrador.index', compact('funcionario'));
    }
}
