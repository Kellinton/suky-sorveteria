<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'funcionarios';

    protected $fillable = [
        'nomeFuncionario',
        'sobrenomeFuncionario',
        'fotoFuncionario',
        'dataNascFuncionario',
        'foneFuncionario',
        'enderecoFuncionario',
        'cidadeFuncionario',
        'estadoFuncionario',
        'cepFuncionario',
        'dataContratacaoFuncionario',
        'cargoFuncionario',
        'salarioFuncionario',
        'tipo_funcionario',
        'statusFuncionario'
    ];

    public function usuario() {
        return $this->morphOne(Usuario::class, 'tipo_usuario');
    }
}
