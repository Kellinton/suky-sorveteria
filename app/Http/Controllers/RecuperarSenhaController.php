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

    public function recuperar(Request $request)
    {
        // // Validando os dados
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email|max:255|exists:usuarios,email',
        //     'token' => 'required|exists:usuarios,token_lembrete',
        // ], [
        //     'email.exists' => 'O email informado não está cadastrado.',
        //     'token.exists' => 'O token informado é inválido.',
        // ]);

        // // Verificando se a validação falhou
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        return view('site.senha-recuperada');
    }
}
