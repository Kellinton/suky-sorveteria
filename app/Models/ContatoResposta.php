<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoResposta extends Model
{
    use HasFactory;

    protected $table = 'contato_respostas';

    protected $fillable = [
        'contato_id',
        'mensagem_resposta',
        'nome_administrador',
        'tipo_administrador'
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class, 'contato_id');
    }
}
