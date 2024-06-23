<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Contato;
use App\Models\ContatoResposta;


class RespostaEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contato;
    public $resposta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contato $contato, ContatoResposta $resposta)
    {
        $this->contato = $contato;
        $this->resposta = $resposta;
    }


    public function build()
    {
        return $this->from('ascensaodev@smpsistema.com.br')
                    ->subject("Resposta ao seu contato")
                    ->view('dashboard.administrador.mensagem.mail.resposta_contato')
                    ->with([
                        'contato' => $this->contato,
                        'resposta' => $this->resposta,
                    ]);
    }
}
