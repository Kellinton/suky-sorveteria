<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //recuperando o id do funcionario da sessão
        $id = session('id');

        // recuperando os dados do funcionário autenticado
        $funcionarioAutenticado = Funcionario::find($id);

        $produtos = Produto::orderBy('id', 'desc')->get();

        // filtrar
        // $acai = Produto::where('categoriaProduto', 'acai')->get();
        // $sorvetePote = Produto::where('categoriaProduto', 'sorvetePote')->get();
        // $picole = Produto::where('categoriaProduto', 'picole')->get();


        return view('dashboard.administrador.produto', compact(
            'funcionarioAutenticado',
            'produtos',

        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valida os dados enviados pelo formulário
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'descricaoProduto' => 'required|string',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|string|max:255',
            'fotoProduto' => 'required|image|max:2048' // Define a validação para a foto (obrigatória, imagem, tamanho máximo de 2MB)
        ]);

        // Salva a foto no sistema de arquivos e obtém o caminho
        $foto = $request->file('foto')->store('produtos', 'public');

        // Cria um novo produto com os dados recebidos do formulário
        $produto = new Produto();
        $produto->nome = $request->nomeProduto;
        $produto->descricao = $request->descricaoProduto;
        $produto->valor = $request->valorProduto;
        $produto->categoria = $request->categoriaProduto;
        $produto->foto = $foto;

        // Salva o novo produto no banco de dados
        $produto->save();

        Alert::success('Produto Cadastrado!', 'O item foi cadastrado.');

        // Redireciona de volta para a página de listagem de produtos
        return redirect()->route('produto.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */

    public function show(Produto $produto)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
