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
        ]);

    }
}
