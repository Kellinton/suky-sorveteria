<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RecuperarSenhaController extends Controller
{
    public function index()
    {

        return view('site.recuperar-senha');
    }

    public function validar(Request $request)
    {
        // Regras de validação para os campos 'email' e 'token'
        $regras = [
            'email'    => 'required|email',
            'token'    => 'required'
        ];
        // Mensagens de erro personalizadas para as regras de validação
        $msg = [
            'email.required'    => 'O campo de e-mail é obrigatório.',
            'email.required'    => 'O e-mail informado não é válido.',
            'token.required'    => 'O Token é obrigatório.'
        ];
        // Executa a validação dos dados recebidos na requisição
        $request->validate($regras, $msg);

        // Obtém os valores dos campos 'email' e 'token' da requisição
        $email = $request->get('email');
        $token = $request->get('token');


        // Busca um usuário no banco de dados com base no email fornecido
        $usuario = Usuario::where('email', $email)->first();


        // Verifica se o usuário existe no banco de dados
        if(!$usuario){
            return back()->withErrors(['email' => 'E-mail inválido.']);
        }


        // Verifica se o token fornecida corresponde ao token armazenado no banco de dados
        if($usuario->token_lembrete != $token){
            return back()->withErrors(['token' => 'Token está Incorreto.']);
        }

        session([
            'email' => $usuario->email,
        ]);

        $usuarioSenha = $usuario->senha;
        //dd($usuarioSenha);

        return view('site.senha-recuperada', compact(
            'usuarioSenha',
));
    }
}
