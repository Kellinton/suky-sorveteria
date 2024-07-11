<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PerfilController extends Controller
{
    public function index($idFuncionario)
    {
        try {

            $funcionario = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
                ->select('funcionarios.fotoFuncionario', 'funcionarios.updated_at', 'usuarios.email', 'usuarios.senha', 'usuarios.token_lembrete')
                ->findOrFail($idFuncionario);

            $updated_at_formatado = Carbon::parse($funcionario->updated_at)->format('d/m/Y H:i');
            $emailUsuario = $funcionario->email;
            $senhaUsuario = $funcionario->senha;




            return response()->json([
                'email' => $emailUsuario,
                'senha' => $senhaUsuario,
                'fotoFuncionario' => $funcionario->fotoFuncionario,
                'token_lembrete' => $funcionario->token_lembrete,
                'updated_at' => $updated_at_formatado,
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Funcionário não encontrado'], 404);
        }
    }
}
