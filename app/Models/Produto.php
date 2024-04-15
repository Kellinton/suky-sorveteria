<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    protected $table = 'produtos';

    protected $fillable = [
        'nomeProduto',
        'descricaoProduto',
        'valorProduto',
        'categoriaProduto',
        'fotoProduto',
        'statusProduto'
    ];
>>>>>>> ab6776f607ce37d1a95b39bb2baf7703065ea0b9
}
