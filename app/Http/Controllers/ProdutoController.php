<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Funcionario;
use App\Models\Contato;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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

        // Quantidade de Produtos
        $totalProdutos = Produto::count();

        // Quantidade valor em produtos
        $totalValorProdutos = Produto::sum('valorProduto');

        // Valor médio em produtos
        $valorMedioProdutos = Produto::avg('valorProduto');

        $produtos = Produto::all();

        $naoLidas = Contato::where('lidoContato', 0)->count();

        // filtrar
        // $acai = Produto::where('categoriaProduto', 'acai')->get();
        // $sorvetePote = Produto::where('categoriaProduto', 'sorvetePote')->get();
        // $picole = Produto::where('categoriaProduto', 'picole')->get();


        return view('dashboard.administrador.produto', compact(
            'funcionarioAutenticado',
            'produtos',
            'totalProdutos',
            'totalValorProdutos',
            'valorMedioProdutos',
            'naoLidas'

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
        //dd($request);

        // Valida os dados enviados pelo formulário
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'descricaoProduto' => 'required|string',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|string|max:255',
            'fotoProduto' => 'required|image|max:2048' // Define a validação para a foto (obrigatória, imagem, tamanho máximo de 2MB)
        ]);


        // Cria um novo produto com os dados recebidos do formulário
        $produto = new Produto();
        $produto->nomeProduto = $request->nomeProduto;
        $produto->descricaoProduto = $request->descricaoProduto;
        $produto->valorProduto = $request->valorProduto;
        $produto->categoriaProduto = $request->categoriaProduto;


        if ($request->hasFile('fotoProduto')) {
            // Obter a imagem do request
            $imagem = $request->file('fotoProduto');

            $nomeArquivo = time() . '.' . $imagem->getClientOriginalExtension();

            // Armazenar a imagem no diretório de destino no storage público
            $caminhoDiretorio = 'img/produtos/' . $produto->categoriaProduto;
            $imagem->storeAs($caminhoDiretorio, $nomeArquivo, 'public');

            // Atualizar o campo 'fotoProduto' do produto com o caminho completo
            $produto->fotoProduto = $nomeArquivo;
        }


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

    public function show($id)
    {
        $produto = Produto::findOrfail($id);

        return redirect()->route('produto.index', compact('produto'));

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
    public function update(Request $request, $id)
    {
        $rules = [
            'nomeProduto' => 'required|max:255',
            'descricaoProduto' => 'required|max:255',
            'valorProduto' => 'required|numeric',
            // 'categoriaProduto' => 'required|in:acai,sorvetePote,picole',
            'fotoProduto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // opcional, máximo de 2MB
        ];

        // Mensagens de erro personalizadas
        $messages = [
            // 'categoriaProduto.in' => 'A categoria selecionada é inválida.',
            'fotoProduto.image' => 'O arquivo enviado não é uma imagem válida.',
            'fotoProduto.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg ou gif.',
            'fotoProduto.max' => 'A imagem não pode ter mais de 2MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Encontre o produto pelo ID
        $produto = Produto::findOrFail($id);

        if ($request->hasFile('fotoProduto')) {
            // Obter a imagem do request
            $imagem = $request->file('fotoProduto');

            // Gerar um nome de arquivo único
            $nomeArquivo = time() . '.' . $imagem->getClientOriginalExtension();

            // Armazenar a imagem no diretório de destino no storage público
            $caminhoDiretorio = 'img/produtos/' . $produto->categoriaProduto;
            $imagem->storeAs($caminhoDiretorio, $nomeArquivo, 'public');

            // Se o produto já tiver uma foto, excluí-la
            if ($produto->fotoProduto) {
                // Caminho completo da foto anterior
                $caminhoFotoAnterior = 'img/produtos/' . $produto->categoriaProduto . '/' . $produto->fotoProduto;

                // Excluir a foto anterior
                Storage::disk('public')->delete($caminhoFotoAnterior);
            }

            // Atualizar o campo 'fotoProduto' do produto com o novo nome do arquivo
            $produto->fotoProduto = $nomeArquivo;
        }

        // Atualize os outros campos do produto
        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        // $produto->categoriaProduto = $request->input('categoriaProduto');
        $produto->valorProduto = $request->input('valorProduto');
        $produto->statusProduto = $request->input('statusProduto');

        // Salve as alterações no banco de dados
        $produto->save();

        Alert::success('Produto Atualizado!', 'O item foi atualizado com sucesso.');

        return redirect()->route('produto.index');
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
