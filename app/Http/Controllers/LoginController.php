<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Models\Usuario;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('site.login');
    }

    public function autenticar(Request $request)
    {

         // Regras de validação para os campos 'email' e 'password'
        $regras = [
            'email'    => 'required|email',
            'password' => 'required'
        ];
        // Mensagens de erro personalizadas para as regras de validação
        $msg = [
            'email.required'    => 'O campo de e-mail é obrigatório.',
            'email.email'    => 'O e-mail informado não é válido.',
            'password.required' => 'O campo de senha é obrigatório.'
        ];
        // Executa a validação dos dados recebidos na requisição
        $request->validate($regras, $msg);

        // Obtém os valores dos campos 'email' e 'password' da requisição
        $email = $request->get('email');
        $senha = $request->get('password');

        // Busca um usuário no banco de dados com base no email fornecido
        $usuario = Usuario::where('email', $email)->first();

         // Verifica se o usuário existe no banco de dados
        if(!$usuario){
            return back()->withErrors(['email' => 'E-mail inválido.']);
        }


        // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
        if($usuario->senha != $senha){
            return back()->withErrors(['password' => 'Senha Incorreta.']);
        }


        // Obtém o tipo de usuário associado ao usuário autenticado
        $tipoUsuario = $usuario->tipo_usuario;

        // Define a variável de sessão 'email' com o email do usuário autenticado
        session([
            'email' => $usuario->email,
        ]);

         // Realiza ações diferentes com base no tipo de usuário
      if($tipoUsuario instanceof Funcionario){

            if($tipoUsuario->tipo_funcionario == 'administrador'){

                // Verifica o status do funcionário
                if($tipoUsuario->statusFuncionario == 'inativo'){

                    Alert::error('Acesso não autorizado!', 'Sua conta existe, mas você não tem acesso à dashboard. Entre em contato com o suporte.');
                    return back()->withErrors(['status' => 'Sua conta existe, mas você não tem acesso à dashboard. Entre em contato com o suporte.']);
                }

                session([
                    'id'            => $tipoUsuario->id,
                    'nome'          => $tipoUsuario->nomeFuncionario,
                    'tipo_usuario'  => $tipoUsuario->tipo_funcionario,
               ]);
            // dd(session('tipo_usuario'));
               return redirect()->route('dashboard.administrador');

            }elseif($tipoUsuario->tipo_funcionario == 'assistente'){

                // Verifica o status do funcionário
                if($tipoUsuario->statusFuncionario == 'inativo'){

                    Alert::error('Acesso não autorizado!', 'Sua conta existe, mas você não tem acesso à dashboard. Entre em contato com o suporte.');
                    return back()->withErrors(['status' => 'Sua conta existe, mas você não tem acesso à dashboard. Entre em contato com o suporte.']);
                }

                session([
                    'id'            => $tipoUsuario->id,
                    'nome'          => $tipoUsuario->nomeFuncionario,
                    'tipo_usuario'  => $tipoUsuario->tipo_funcionario,
               ]);

               return redirect()->route('dashboard.assistente');

            }
        }


        return back()->withErrors(['email' => 'Erro desconhecido autenticação']);



    }
}

