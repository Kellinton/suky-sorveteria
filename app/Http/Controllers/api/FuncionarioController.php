<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\ModelNotFoundException;


class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
        ->select('funcionarios.*', 'usuarios.email', 'usuarios.senha')
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
        ], 200);
    }

    public function show($id)
    {

         $funcionario = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
         ->select('funcionarios.*', 'usuarios.email', 'usuarios.senha')
         ->findOrFail($id);


         return response()->json([
             'funcionario' => $funcionario,
         ], 200);
    }

    public function update(Request $request, $id)
    {
          $rules = [
              'email' => 'required|email|max:255',
              'nomeFuncionario' => 'required|max:20',
              'sobrenomeFuncionario' => 'required|max:20',
              'senha' => 'required|max:20',
              'fotoFuncionario' => 'nullable|string',
          ];

          $messages = [
              'email.required' => 'O campo E-mail é obrigatório.',
              'email.max' => 'O campo E-mail deve ter no máximo :max caracteres.',
             'nomeFuncionario.required' => 'O campo Nome é obrigatório.',
              'nomeFuncionario.max' => 'O campo Nome deve ter no máximo :max caracteres.',
              'sobrenomeFuncionario.required' => 'O campo Sobrenome é obrigatório.',
              'sobrenomeFuncionario.max' => 'O campo Sobrenome deve ter no máximo :max caracteres.',
              'senha.required' => 'O campo Senha é obrigatório.',
              'senha.max' => 'O campo Senha deve ter no máximo :max caracteres.',

          ];

          $validator = Validator::make($request->all(), $rules, $messages);

          if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()], 422); // status HTTP 422 (Unprocessable Entity). status para indicar que a requisição foi bem formada, mas não pôde ser processada devido a erros de validação.
          }

        $usuario = Usuario::find($id);


        if ($usuario && $usuario->tipo_usuario instanceof Funcionario) {
            $funcionario = $usuario->tipo_usuario;


            $usuario->email                             = $request->input('email');
            $usuario->senha                             = $request->input('senha');
            $usuario->nome                              = $request->input('nomeFuncionario');
            $funcionario->nomeFuncionario               = $request->input('nomeFuncionario');
            $funcionario->sobrenomeFuncionario          = $request->input('sobrenomeFuncionario');
            $funcionario->foneFuncionario               = $request->input('foneFuncionario');
            $funcionario->dataNascFuncionario           = $request->input('dataNascFuncionario');
            $funcionario->enderecoFuncionario           = $request->input('enderecoFuncionario');
            $funcionario->cidadeFuncionario             = $request->input('cidadeFuncionario');
            $funcionario->estadoFuncionario             = $request->input('estadoFuncionario');
            $funcionario->cepFuncionario                = $request->input('cepFuncionario');
            $funcionario->dataContratacaoFuncionario    = $request->input('dataContratacaoFuncionario');
            $funcionario->cargoFuncionario              = $request->input('cargoFuncionario');
            $funcionario->salarioFuncionario            = $request->input('salarioFuncionario');
            $funcionario->tipo_funcionario              = $request->input('tipo_funcionario');
            $funcionario->statusFuncionario             = $request->input('statusFuncionario');

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
