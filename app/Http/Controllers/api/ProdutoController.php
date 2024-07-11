<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
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
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'nomeProduto' => 'required|max:255',
            'descricaoProduto' => 'required|max:255',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|in:acai,sorvetePote,picole',
            'fotoProduto' => 'nullable|string',
            // 'fotoProduto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $produto = new Produto();

        if ($request->fotoProduto) {
            // Salvar no storage
            $base64Image = $request->fotoProduto;
            $imagem = base64_decode($base64Image);
            $nomeArquivo = time() . '.png';
            $categoriaProduto = $request->input('categoriaProduto');

            // Caminho temporário para salvar a imagem
            Storage::disk('public')->put('temp/' . $nomeArquivo, $imagem);

            // Mover para o diretório final
            Storage::disk('public')->move('temp/' . $nomeArquivo, 'img/produtos/' . $categoriaProduto . '/' . $nomeArquivo);

            // Atualizar o caminho da imagem no produto
            $produto->fotoProduto = $nomeArquivo;
        }

        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        $produto->categoriaProduto = $request->input('categoriaProduto');
        $produto->valorProduto = $request->input('valorProduto');
        $produto->statusProduto = $request->input('statusProduto');

        $produto->save();

        return response()->json(['produto' => $produto], 201);

    }


    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json($produto, 200);
    }

    public function update(Request $request, $id)
    {
        // Log::info('Dados recebidos:', $request->all());

        $rules = [
            'nomeProduto' => 'required|max:255',
            'descricaoProduto' => 'required|max:255',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|in:acai,sorvetePote,picole',
            'fotoProduto' => 'nullable|string',
            //  'fotoProduto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $produto = Produto::findOrFail($id);

        if ($request->fotoProduto) {
            // Salvar no storage
            $base64Image = $request->fotoProduto;
            $imagem = base64_decode($base64Image);
            $nomeArquivo = time() . '.png';
            Storage::disk('public')->put('produtos/' . $nomeArquivo, $imagem);

            // Mover para o diretório public
            Storage::disk('public')->move('produtos/' . $nomeArquivo, 'img/produtos/' . $produto->categoriaProduto . '/' . $nomeArquivo);

            // Se o produto já tiver uma foto, irá excluir
            if ($produto->fotoProduto) {
                // Caminho completo da foto anterior
                $caminhoFotoAnterior = 'img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto;

                // Excluir a foto anterior
                Storage::disk('public')->delete($caminhoFotoAnterior);
            }

            $produto->fotoProduto = $nomeArquivo;
        }

        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        // $produto->categoriaProduto = $request->input('categoriaProduto');
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
