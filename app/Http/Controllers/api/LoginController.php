<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', $credentials['email'])->where('senha', $credentials['senha'])->first();

        if ($usuario && ($usuario->tipo_usuario_type === 'administrador' || $usuario->tipo_usuario_type === 'assistente')) {
            $funcionario = $usuario->tipo_usuario()->first();
            if ($funcionario) {

                $token = $usuario->createToken('Token de Acesso')->plainTextToken;

                return response()->json([
                    'message' => 'Login bem sucedido!',
                    'usuario' => [
                        'id'    => $usuario->id,
                        'nome'  => $usuario->nome,
                        'email' => $usuario->email,
                        'tipo_usuario'  => $usuario->tipo_usuario_type,
                        'dados_funcionario'   => [
                            'idFuncionario'   => $funcionario->id,
                            'nome'      => $funcionario->nomeFuncionario,
                        ],
                    ],

                    'access_token' => $token,
                    'token_type'  => 'Bearer',
                ]);
            }
        }
        return response()->json(['message' => 'Credenciais inválidas ou usuário não é funcionário.'], 401);
    }
}
