<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Contato;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class AdministradorController extends Controller
{
    public function __construct()
    {
        // Configura o locale para português do Brasil em todo o controlador
        Carbon::setLocale('pt_BR');

        // Timezone de Brasília
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index(){
        //recuperando o id do funcionario da sessão
         $id = session('id');

         // recuperando os dados do funcionário autenticado
         $funcionarioAutenticado = Funcionario::find($id);

        //dd($funcionarioAutenticado);

         if (!$funcionarioAutenticado) {
            abort(404, 'Funcionario não encontrado!');
         }

         // Quantidade valor em produtos
         $totalValorProdutos = Produto::sum('valorProduto');

         // Quantidade de Funcionários
         $totalFuncionarios = Funcionario::count();


         // Contar o número de mensagens não lidas
         $naoLidas = Contato::where('lidoContato', 0)->count();

         $produtos = Produto::orderBy('id', 'desc')->take(4)->get();

         $contatos = Contato::orderBy('id', 'desc')->take(6)->get();

         return view('dashboard.administrador.index', compact(
            'funcionarioAutenticado', 'totalValorProdutos', 'totalFuncionarios', 'produtos', 'contatos', 'naoLidas'
        ));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', $credentials['email'])->where('senha', $credentials['senha'])->first();

        if ($usuario && $usuario->tipo_usuario_type === 'administrador') {
            $administrador = $usuario->tipo_usuario()->first();
            if ($administrador) {

                $token = $usuario->createToken('Token de Acesso')->plainTextToken;

                return response()->json([
                    'message' => 'Login bem sucedido!',
                    'usuario' => [
                        'id'    => $usuario->id,
                        'nome'  => $usuario->nome,
                        'email' => $usuario->email,
                        'tipo_usuario'  => $usuario->tipo_usuario_type,
                        'dados_administrador'   => [
                            'idAdministrador'   => $administrador->id,
                            'nome'      => $administrador->nome,
                        ],
                    ],

                    'acess_token' => $token,
                    'token_type'  => 'Bearer',
                ]);
            }
        }
        return response()->json(['message' => 'Credenciais inválidas ou usuário não é administrador'], 401);
    }

}
