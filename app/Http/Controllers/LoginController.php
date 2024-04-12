<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('site.login');
    }

    // public function autenticar(Request $request)
    // {
    //      // Regras de validação para os campos 'email' e 'password'
    //     $regras = [
    //         'email'    => 'required|email',
    //         'password' => 'required'
    //     ];
    //     // Mensagens de erro personalizadas para as regras de validação
    //     $msg = [
    //         'email.required'    => 'O campo de e-mail é obrigatório.',
    //         'email.required'    => 'O e-mail informado não é válido.',
    //         'password.required' => 'O campo de senha é obrigatório.'
    //     ];
    //     // Executa a validação dos dados recebidos na requisição
    //     $request->validate($regras, $msg);

    //     // Obtém os valores dos campos 'email' e 'password' da requisição
    //     $email = $request->get('email');
    //     $senha = $request->get('password');

    //     // Busca um usuário no banco de dados com base no email fornecido
    //     $usuario = Usuario::where('email', $email)->first();

    //      // Verifica se o usuário existe no banco de dados
    //     if(!$usuario){
    //         return back()->withErrors(['email' => 'O email informado não está cadastrado.']);
    //     }


    //     // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
    //     if($usuario->senha != $senha){
    //         return back()->withErrors(['password' => 'Senha Incorreta.']);
    //     }

    //     // Obtém o tipo de usuário associado ao usuário autenticado
    //     $tipoUsuario = $usuario ->tipo_usuario;

    //      // Realiza ações diferentes com base no tipo de usuário
    //   if($tipoUsuario instanceof Funcionario){

    //     // dd($tipoUsuario);

    //         if($tipoUsuario->tipoFuncionario == 'administrativo'){

    //             session([
    //                 'id'            => $tipoUsuario->idFuncionario,
    //                 'nome'          => $tipoUsuario->nomeFuncionario,
    //                 'email'         => $tipoUsuario->email,
    //                 'tipo_usuario'  => $tipoUsuario->tipoFuncionario,
    //            ]);

    //            return redirect()->route('dashboard.administrativo');

    //         }elseif($tipoUsuario->tipoFuncionario == 'atendente'){

    //             session([
    //                 'id'            => $tipoUsuario->idFuncionario,
    //                 'nome'          => $tipoUsuario->nomeFuncionario,
    //                 'email'         => $tipoUsuario->email,
    //                 'tipo_usuario'  => $tipoUsuario->tipoFuncionario,
    //            ]);

    //            return redirect()->route('dashboard.atendente');

    //         }
    //     }


    //     return back()->withErrors(['email' => 'Erro desconhecido autenticação']);



    // }
}

