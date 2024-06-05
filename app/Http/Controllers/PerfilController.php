<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
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

        //dd($funcionarioPerfil);
        return view('dashboard.administrador.perfil', compact(
            'funcionarioAutenticado',
            'funcionarioPerfil'
        ));
    }
}
