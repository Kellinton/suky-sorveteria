<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PerfilController extends Controller
{
    public function show($id)
    {
        try {

            $funcionario = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
                ->select(
                    'funcionarios.nomeFuncionario',
                    'funcionarios.sobrenomeFuncionario',
                    'funcionarios.fotoFuncionario',
                    'funcionarios.updated_at',
                    'usuarios.nome',
                    'usuarios.email',
                    'usuarios.senha',
                )
                ->findOrFail($id);

            $updated_at_formatado = Carbon::parse($funcionario->updated_at)->format('d/m/Y H:i');


            return response()->json([
                'nome' => $funcionario->nomeFuncionario,
                'sobrenome' => $funcionario->sobrenomeFuncionario,
                'email' => $funcionario->email,
                'senha' => $funcionario->senha,
                'fotoFuncionario' => $funcionario->fotoFuncionario,
                'updated_at' => $updated_at_formatado,
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Funcionário não encontrado'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'nome' => 'required|max:20',
            'sobrenome' => 'required|max:20',
            'senha' => 'required|min:8',
            'fotoFuncionario' => 'nullable|string',
        ];

        $messages = [
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.max' => 'O campo E-mail deve ter no máximo :max caracteres.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.max' => 'O campo Nome deve ter no máximo :max caracteres.',
            'sobrenome.required' => 'O campo Sobrenome é obrigatório.',
            'sobrenome.max' => 'O campo Sobrenome deve ter no máximo :max caracteres.',
            'senha.required' => 'O campo Senha é obrigatório.',
            'senha.min' => 'O campo Senha deve ter no mínimo :min caracteres.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // status HTTP 422 (Unprocessable Entity). status para indicar que a requisição foi bem formada, mas não pôde ser processada devido a erros de validação.
        }
        
        $usuario = Usuario::find($id);

        // Se o usuário existe, busca o funcionário relacionado
        if ($usuario && $usuario->tipo_usuario instanceof Funcionario) {
            $funcionario = $usuario->tipo_usuario;


            $usuario->email = $request->input('email');
            $usuario->senha = $request->input('senha');
            $usuario->nome = $request->input('nome');
            $funcionario->nomeFuncionario = $request->input('nome');
            $funcionario->sobrenomeFuncionario = $request->input('sobrenome');

            if ($request->has('fotoFuncionario')) {

                $base64Image = $request->fotoFuncionario;
                $imagem = base64_decode($base64Image);
                $nomeArquivo = time() . '.png';
                Storage::disk('public')->put('funcionarios/' . $nomeArquivo, $imagem);

                Storage::disk('public')->move('funcionarios/' . $nomeArquivo, 'img/funcionarios/' . $nomeArquivo);


                if ($funcionario->fotoFuncionario) {

                    $caminhoFotoAnterior = 'img/funcionarios/' . $funcionario->fotoFuncionario;


                    Storage::disk('public')->delete($caminhoFotoAnterior);
                }

                $funcionario->fotoFuncionario = $nomeArquivo;

            }


            $funcionario->save();
            $usuario->save();

            return response()->json(['message' => 'Dados atualizados com sucesso'], 200);
        }

        return response()->json(['message' => 'Usuário não encontrado'], 404);

    }
}
