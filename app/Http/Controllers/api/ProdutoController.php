<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProdutoController extends Controller
{

    public function index()
    {

        $totalProdutos = Produto::count();
        $totalValorProdutos = Produto::sum('valorProduto');
        $valorMedioProdutos = Produto::avg('valorProduto');
        $produtos = Produto::orderBy('id', 'desc')->get();

        $totalValorProdutos = number_format($totalValorProdutos, 2, ',', '.');
        $valorMedioProdutos = number_format($valorMedioProdutos, 2, ',', '.');


        return response()->json([
            'produtos' => $produtos,
            'totalProdutos' => $totalProdutos,
            'totalValorProdutos' => $totalValorProdutos,
            'valorMedioProdutos' => $valorMedioProdutos,
        ]);
    }

    public function store(Request $request)
    {
        $ultimoProduto = Produto::latest('id')->first();
        $ultimoID = $ultimoProduto ? $ultimoProduto->id : 0;
        $proximoID = $ultimoID + 1;

        $validator = Validator::make($request->all(), [
            'nomeProduto' => 'required|string|max:255',
            'descricaoProduto' => 'required|string',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|string|max:255',
            'fotoProduto' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $categoriaProduto = $request->categoriaProduto;
        $foto = $request->file('fotoProduto')->store('img/produtos/' . $categoriaProduto , 'public');

        $produto = new Produto();
        $produto->nomeProduto = $request->nomeProduto;
        $produto->descricaoProduto = $request->descricaoProduto;
        $produto->valorProduto = $request->valorProduto;
        $produto->categoriaProduto = $request->categoriaProduto;
        $produto->fotoProduto = $foto;

        if ($request->hasFile('fotoProduto')) {
            $imagem = $request->file('fotoProduto');
            $nomeArquivo = Str::slug($produto->nomeProduto) . '_' . $proximoID . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('img/produtos/' .  $categoriaProduto . '/' ), $nomeArquivo);
            $produto->fotoProduto = $nomeArquivo;
        }

        $produto->save();

        return response()->json($produto, 201);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto);
    }

    public function update(Request $request, $id)
    {
        Log::info('Dados recebidos:', $request->all());


        //   dd(
        //       $request->input('nomeProduto'),
        //       $request->input('descricaoProduto'),
        //       $request->input('valorProduto'),
        //       $request->input('categoriaProduto'),
        //       $request->file('fotoProduto'),
        //       $request->input('statusProduto')
        //   );

        //  dd($request->all());

        $rules = [
            'nomeProduto' => 'required|max:255',
            'descricaoProduto' => 'required|max:255',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|in:acai,sorvetePote,picole',
             'fotoProduto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $produto = Produto::findOrFail($id);

        if ($request->hasFile('fotoProduto')) {
            $imagem = $request->file('fotoProduto');
            $nomeArquivo = Str::slug($produto->nomeProduto) . '_' . $id . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('img/produtos/' .  $produto->categoriaProduto . '/' ), $nomeArquivo);
            $produto->fotoProduto = $nomeArquivo;
        }

        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        $produto->categoriaProduto = $request->input('categoriaProduto');
        $produto->valorProduto = $request->input('valorProduto');
        $produto->statusProduto = $request->input('statusProduto');
        // dd($produto);
        $produto->save();

        return response()->json($produto);
    }

    // public function destroy($id)
    // {
    //     $produto = Produto::findOrFail($id);
    //     $produto->delete();
    //     return response()->json(null, 204);
    // }
}
