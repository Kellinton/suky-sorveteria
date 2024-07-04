<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class AssistenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // Configura o locale para português do Brasil em todo o controlador
        Carbon::setLocale('pt_BR');

        // Timezone de Brasília
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index()
    {

        $id = session('id');


        $funcionarioAutenticado = Funcionario::find($id);


        // $contatos = Contato::orderBy('id', 'desc')->get();

        $contatos = Contato::leftJoin('contato_respostas', 'contatos.id', '=', 'contato_respostas.contato_id')
        ->select(
            'contatos.*',
            'contato_respostas.mensagem_resposta',
            'contato_respostas.nome_administrador',
            'contato_respostas.foto_administrador',
            'contato_respostas.tipo_administrador',
            'contatos.created_at as contato_created_at',
            'contatos.updated_at as contato_updated_at',
            'contato_respostas.created_at as resposta_created_at',
            'contato_respostas.updated_at as resposta_updated_at'
        )
        ->orderBy('contatos.id', 'desc')
        ->get();

        // dd($contatos);

        $naoLidas = Contato::where('lidoContato', 0)->count();

        $mensagensRespondidas = Contato::where('respondidoContato', 1)->count();

        $totalMensagens = Contato::count();

        $totalMensagensComFavorito = Contato::where('favoritoContato', 1)->count();

        return view('dashboard.assistente.index', compact(
            'funcionarioAutenticado',
            'contatos',
            'totalMensagens',
            'mensagensRespondidas',
            'totalMensagensComFavorito',
            'naoLidas',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::findOrFail($id);

        return view('dashboard.assistente.mensagem.show', compact('contato'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        //
    }

    public function favoritar($id)
    {

        $contato = Contato::find($id);


        if ($contato) {
            $contato->favoritoContato = !$contato->favoritoContato; // Inverte o valor de favoritoContato
            $contato->save();

            return redirect()->route('assistente.contato.index');

            // return response()->json(['favorito' => $contato->favoritoContato]);
        } else {
            // return response()->json(['error' => 'Contato não encontrado'], 404);
        }
    }

    public function remover($id)
    {

        $contato = Contato::find($id);


        if ($contato) {
            $contato->removidoContato = !$contato->removidoContato;
            $contato->save();

            return redirect()->route('assistente.contato.index');

        } else {

        }
    }


    public function verificarLido($id)
    {
        $contato = Contato::find($id);
        if ($contato) {
            return response()->json(['lido' => $contato->lidoContato]);
        } else {
            return response()->json(['error' => 'Contato não encontrado'], 404);
        }
    }

    public function atualizarLido($id)
    {
        $contato = Contato::find($id);
        if ($contato) {
            $contato->lidoContato = true;
            $contato->save();
            return response()->json(['success' => 'Status de leitura atualizado com sucesso']);
        } else {
            return response()->json(['error' => 'Contato não encontrado'], 404);
        }
    }

    public function showPerfil(){
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


        return view('dashboard.assistente.perfil', compact(
            'funcionarioAutenticado',
            'funcionarioPerfil',
            'naoLidas'
        ));
    }

    public function updatePerfil(Request $request, $id)
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

        return redirect()->route('assistente.perfil.index');
    }

}
