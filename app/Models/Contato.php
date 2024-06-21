<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'contatos';

    protected $fillable = [
        'nomeContato',
        'emailContato',
        'foneContato',
        'assuntoContato',
        'mensagemContato',
        'lidoContato',
        'favoritoContato',
        'removidoContato',
        'respondidoContato'
    ];

    public function resposta()
    {
        return $this->hasOne(ContatoResposta::class, 'contato_id');
    }
}
