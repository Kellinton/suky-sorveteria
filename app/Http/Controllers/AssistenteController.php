<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;

use Illuminate\Http\Request;

class AssistenteController extends Controller
{
    public function index(){
          //recuperando o id do funcionario da sessão
          $id = session('id');

          // recuperando os dados do funcionário autenticado
          $funcionarioAutenticado = Funcionario::find($id);



         //   dd($funcionarioAutenticado);

          if (!$funcionarioAutenticado) {
             abort(404, 'Funcionario não encontrado!');
          }


          return view('dashboard.assistente.index', compact(
             'funcionarioAutenticado',
          ));
          
    }
}
