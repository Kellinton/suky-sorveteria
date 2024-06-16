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
        // Obtém o último produto cadastrado
        $ultimoProduto = Produto::latest('id')->first();

        // Verifica se existe algum produto cadastrado
        if ($ultimoProduto) {
            // Se houver um produto cadastrado, obtenha o ID do último produto
            $ultimoID = $ultimoProduto->id;
        } else {
            // Se não houver nenhum produto cadastrado, defina o ID como 1
            $ultimoID = 1;
        }


        // Calcula o ID do próximo produto
        $proximoID = $ultimoID + 1;


        // Valida os dados enviados pelo formulário
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'descricaoProduto' => 'required|string',
            'valorProduto' => 'required|numeric',
            'categoriaProduto' => 'required|string|max:255',
            'fotoProduto' => 'required|image|max:2048' // Define a validação para a foto (obrigatória, imagem, tamanho máximo de 2MB)
        ]);

        // Obtém a categoria do produto
        $categoriaProduto = $request->categoriaProduto;
        // Salva a foto no sistema de arquivos e obtém o caminho
        $foto = $request->file('fotoProduto')->store('img/produtos/' . $categoriaProduto , 'public');

        // Cria um novo produto com os dados recebidos do formulário
        $produto = new Produto();
        $produto->nomeProduto = $request->nomeProduto;
        $produto->descricaoProduto = $request->descricaoProduto;
        $produto->valorProduto = $request->valorProduto;
        $produto->categoriaProduto = $request->categoriaProduto;
        $produto->fotoProduto = $foto;

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('fotoProduto')) {

            // Obtém o objeto da imagem
            $imagem = $request->file('fotoProduto');
            // Define o nome do arquivo usando o ID do próximo produto e o nome original da imagem
            $nomeArquivo = Str::slug($produto->nomeProduto) . '_' . $proximoID . '.' . $imagem->getClientOriginalExtension();

            // Move a imagem para o diretório de destino
            $imagem->move(public_path('img/produtos/' .  $categoriaProduto . '/' ), $nomeArquivo);
            // Define o nome da imagem no objeto do produto
            $produto->fotoProduto = $nomeArquivo;
        }

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
            'categoriaProduto' => 'required|in:acai,sorvetePote,picole',
            'fotoProduto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // opcional, máximo de 2MB
        ];

        // Mensagens de erro personalizadas
        $messages = [
            'categoriaProduto.in' => 'A categoria selecionada é inválida.',
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

        // Verifique se uma nova imagem foi enviada
        if ($request->hasFile('fotoProduto')) {
            // Se uma nova imagem foi enviada, mova-a para o diretório e atualize o nome da imagem no produto
            $imagem = $request->file('fotoProduto');

            $nomeArquivo = Str::slug($produto->nomeProduto) . '_' . $id . '.' . $imagem->getClientOriginalExtension();

            // Move a imagem para o diretório de destino
            $imagem->move(public_path('img/produtos/' .  $produto->categoriaProduto . '/' ), $nomeArquivo);
            // Define o nome da imagem no objeto do produto
            $produto->fotoProduto = $nomeArquivo;

            // Se o produto já tiver uma foto, exclua-a
            // if ($produto->fotoProduto) {
            //     Storage::disk('public')->delete($produto->fotoProduto);
            // }

            $produto->fotoProduto = $nomeArquivo;
        }

        // Atualize os outros campos do produto
        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        $produto->categoriaProduto = $request->input('categoriaProduto');
        $produto->valorProduto = $request->input('valorProduto');
        $produto->statusProduto = $request->input('statusProduto');

        // Salve as alterações no banco de dados
        $produto->save();

        Alert::success('Produto Atualizado!', 'O item foi atualizado com sucesso.');

        return redirect()->route('produto.index');
    }

    // public function ativar($id)
    // {
    //     $produto = Produto::find($id);

    //     if ($produto) {

    //         $produto->statusProduto = 'ativo';
    //         $produto->save();

    //         Alert::success('Alterado para disponível.');

    //         return redirect()->route('produto.index');

    //     } else {
    //         Alert::error('Erro!', 'Ocorreu um erro ao ativar o item.');
    //         return redirect()->route('produto.index');
    //     }
    // }


    // public function desativar($id)
    // {
    //     $produto = Produto::find($id);


    //     if ($produto) {

    //         $produto->statusProduto = 'inativo';
    //         $produto->save();

    //         Alert::success('Alterado para indisponível.');

    //         return redirect()->route('produto.index');
    //     } else {

    //         return redirect()->route('produto.index');
    //     }
    // }


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
