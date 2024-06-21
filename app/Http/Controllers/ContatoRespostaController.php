<?php

namespace App\Http\Controllers;

use App\Models\ContatoResposta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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




    //  public function enviarResposta(Request $request)
    //  {
    //      $request->validate([
    //          'contato_id' => 'required|exists:contatos,id',
    //          'mensagem' => 'required|string',
    //          // Você pode adicionar outras validações aqui, se necessário
    //      ]);

    //      // Encontrar o contato pelo ID
    //      $contato = Contato::findOrFail($request->contato_id);

    //      // Salvar a resposta na tabela respostas_contatos
    //      $resposta = new RespostaContato();
    //      $resposta->contato_id = $contato->id;
    //      $resposta->mensagem_resposta = $request->mensagem;
    //      $resposta->nome_administrador = auth()->user()->name; // Nome do administrador logado
    //      $resposta->tipo_administrador = auth()->user()->tipo; // Tipo do administrador logado
    //      $resposta->save();

    //      // Atualizar o campo respondidoContato para indicar que foi respondido
    //      $contato->respondidoContato = true;
    //      $contato->save();

    //      // Enviar e-mail com a resposta para o contato
    //      $this->enviarEmailResposta($contato, $resposta);

    //      return redirect()->back()->with('success', 'Resposta enviada com sucesso!');
    //  }

    //  private function enviarEmailResposta(Contato $contato, RespostaContato $resposta)
    //  {
    //      // Lógica para enviar e-mail usando o seu servidor SMTP
    //      // Aqui você pode usar Laravel Mail para enviar o e-mail
    //      // Exemplo de implementação simplificada:

    //      Mail::send('emails.resposta_contato', [
    //          'contato' => $contato,
    //          'resposta' => $resposta
    //      ], function ($message) use ($contato) {
    //          $message->to($contato->emailContato, $contato->nomeContato)
    //                  ->subject('Resposta à sua mensagem de contato');
    //      });

    //      // Verifique a documentação do Laravel para configurar o envio de e-mails usando SMTP
    //      // https://laravel.com/docs/8.x/mail
    //  }
}
