<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {


            $produtos = Produto::all();
            
            // dd($produtos);

                // Atribui os dados do produto às variáveis
                // $nomeProduto = $produtos->nomeProduto;
                // $descricaoProduto = $produtos->descricaoProduto;
                // $valorProduto = $produtos->valorProduto;
                // $categoriaProduto = $produtos->categoriaProduto;
                // $fotoProduto = $produtos->fotoProduto;



                // return view('site.home', [
                //     'nomeProduto' => $nomeProduto,
                //     'descricaoProduto' => $descricaoProduto,
                //     'valorProduto' => $valorProduto,
                //     'categoriaProduto' => $categoriaProduto,
                //     'foto' => $fotoProduto,
                // ]);

        return view('site.home', [
            'produtos' => $produtos,
        ]);
    }


}
