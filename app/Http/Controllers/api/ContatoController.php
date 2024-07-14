<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {

        $mensagens = Contato::orderBy('created_at', 'desc')->get();

        $naoRespondidas = Contato::where('respondidoContato', 0)->count();

        $mensagensRespondidas = Contato::where('respondidoContato', 1)->count();

        $mensagensTotais = Contato::count();

        // Formatar as mensagens e datas
         $mensagens = $mensagens->map(function($mensagem) {
            return [
                 'id' => $mensagem->id,
                 'nomeContato' => $mensagem->nomeContato,
                 'assuntoContato' => $mensagem->assuntoContato,
                 'mensagemContato' => Str::limit($mensagem->mensagemContato, 25, '...'),
                 'created_at' => Carbon::parse($mensagem->created_at)->diffForHumans(),
             ];
         });


        return response()->json([
            'mensagens' => $mensagens,
            'naoRespondidas' => $naoRespondidas,
            'mensagensRespondidas' => $mensagensRespondidas,
            'mensagensTotais' => $mensagensTotais,
        ], 200);

    }

    public function show($id)
    {
        // Busca a mensagem de contato específica pelo ID
        $mensagem = Contato::leftJoin('contato_respostas', 'contatos.id', '=', 'contato_respostas.contato_id')
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
        ->where('contatos.id', $id)
        ->orderBy('contatos.id', 'desc')
        ->firstOrFail();

        $contatoCreatedAtFormatado = Carbon::parse($mensagem->contato_created_at)->format('d/m/Y H:i');
        $respostaCreatedAtFormatado = $mensagem->resposta_created_at ? Carbon::parse($mensagem->resposta_created_at)->format('d/m/Y H:i') : null;
        $tipoAdministradorFormatado = ucfirst($mensagem->tipo_administrador);

        return response()->json([
            'id' => $mensagem->id,
            'nomeContato' => $mensagem->nomeContato,
            'assuntoContato' => $mensagem->assuntoContato,
            'mensagemContato' => $mensagem->mensagemContato,
            'emailContato' => $mensagem->emailContato,
            'nome_administrador' => $mensagem->nome_administrador,
            'foto_administrador' => $mensagem->foto_administrador,
            'tipo_administrador' => $tipoAdministradorFormatado,
            'mensagem_resposta' => $mensagem->mensagem_resposta,
            'contato_created_at' => $contatoCreatedAtFormatado,
            'resposta_created_at' => $respostaCreatedAtFormatado,
        ], 200);
    }
}
