<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class ContatoController extends Controller
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

        $totalMensagens = Contato::count();

        $totalMensagensComFavorito = Contato::where('favoritoContato', 1)->count();

        return view('dashboard.administrador.mensagem', compact(
            'funcionarioAutenticado',
            'contatos',
            'totalMensagens',
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

        return view('dashboard.administrador.mensagem.show', compact('contato'));

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

            return redirect()->route('contato.index');

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

            return redirect()->route('contato.index');

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



}
