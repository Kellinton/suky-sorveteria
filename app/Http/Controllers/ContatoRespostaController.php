<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Funcionario;
use App\Models\Contato;
use App\Models\ContatoResposta;
use App\Mail\RespostaEmail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ContatoRespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\ContatoResposta  $contatoResposta
     * @return \Illuminate\Http\Response
     */
    public function show(ContatoResposta $contatoResposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContatoResposta  $contatoResposta
     * @return \Illuminate\Http\Response
     */
    public function edit(ContatoResposta $contatoResposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContatoResposta  $contatoResposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContatoResposta $contatoResposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContatoResposta  $contatoResposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContatoResposta $contatoResposta)
    {
        //
    }




    public function enviarResposta(Request $request)
    {

        $request->validate([
            'contato_id' => 'required|exists:contatos,id',
            'mensagem_resposta' => 'required|string',
            'nome_administrador' => 'required|string',
            'foto_administrador' => 'required|string',
            'tipo_administrador' => 'required|string',
        ]);

        // Encontrar o contato pelo ID
        $contato = Contato::findOrFail($request->contato_id);
        // dd($contato);
        // Salvar a resposta na tabela respostas_contatos
        $resposta = new ContatoResposta();
        $resposta->contato_id = $contato->id;
        $resposta->mensagem_resposta = $request->mensagem_resposta;
        $resposta->nome_administrador = $request->nome_administrador; // Nome e sobrenome do administrador logado
        $resposta->foto_administrador = $request->foto_administrador; // Foto do administrador logado
        $resposta->tipo_administrador = $request->tipo_administrador; // Tipo do administrador logado

        $resposta->save();

        // Atualizar o campo respondidoContato para indicar que foi respondido
        $contato->lidoContato = true;
        $contato->respondidoContato = true;

        $contato->save();

        try {
            Mail::to($contato->emailContato)->send(new RespostaEmail($contato, $resposta));
        } catch (\Exception $e) {
            // Log do erro no Laravel
            Log::error('Erro ao enviar e-mail: ' . $e->getMessage());

            Alert::error('Mensagem não enviada!', 'Erro ao enviar a mensagem. Tente novamente mais tarde.');
            return back()->with('error', 'Erro ao enviar e-mail.', 500);
        }

        Alert::success('Resposta Enviada!', 'Resposta enviada com sucesso!');
        return redirect()->back()->with('success', 'Resposta enviada com sucesso!');
    }
}
