<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PerfilController extends Controller
{
    public function index()
    {
          //recuperando o id do funcionario da sessão
          $id = session('id');

          // recuperando os dados do funcionário autenticado
          $funcionarioAutenticado = Funcionario::find($id);

          $funcionarioPerfil = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
          ->where('funcionarios.id', $id)
          ->select('funcionarios.*', 'usuarios.*')
          ->first(); // Usando first() ao invés de get() para recuperar apenas um registro
          // dd($funcionarioPerfil);

          $naoLidas = Contato::where('lidoContato', 0)->count();


        return view('dashboard.administrador.perfil', compact(
            'funcionarioAutenticado',
            'funcionarioPerfil',
            'naoLidas'
        ));


    }
    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $validarDados = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'senha' => 'required|min:8',
        ]);

        // Verifica se houve falha na validação
        if ($validarDados->fails()) {
            // Coleta as mensagens de erro
            $errorMessages = implode( $validarDados->errors()->all());

            // Exibir a mensagem de erro usando SweetAlert
            Alert::error('Erro ao Atualizar!', 'Por favor, corrija os seguintes erros: ' . $errorMessages);

            return redirect()->back()->withErrors($validarDados)->withInput();
        }


        $request->merge([
            'atualizado_em' => now()
        ]);

        $usuario = Usuario::where('tipo_usuario_id', $id)->firstOrFail(); // ajustar o relacionamento entre Funcionario e Usuario
        // dd($usuario);

        // Atualizar apenas os campos que estão presentes na requisição
        if ($request->has('email')) {
            $usuario->email = $request->input('email');
        }

        if ($request->has('senha')) {
            $usuario->senha = $request->input('senha');
        }

        $usuario->save();

        // Atualizar os dados na sessão se eles foram modificados, para evitar o logout automático por causa da autenticação
        if ($request->has('email')) {
            session(['email' => $usuario->email]);
        }

        // if ($request->has('senha')) {
        //     // Normalmente, não armazenamos senhas na sessão. Esta linha é só se for realmente necessário.
        //     session(['senha' => $request->input('senha')]);
        // }


        Alert::success('Atualizado!', 'Foi atualizado com sucesso.');

        return redirect()->route('perfil.index');
    }
}
