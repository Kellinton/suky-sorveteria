<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class FuncionarioController extends Controller
{

    public $funcionario;


    public function __construct(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
    }
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

        // Quantidade de Funcionários
        $totalFuncionarios = Funcionario::count();

        // Quantidade Salário
        $totalSalario = Funcionario::sum('salarioFuncionario');


        // retornando os funcionários, juntando a tabela funcionários e usuários, obtendo todos os campos da tabela funcionario e o campo email da tabela usuários
        $funcionarios = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
                            ->select('funcionarios.*', 'usuarios.email')
                            ->get();

        //dd($funcionarios);

        // $funcionario = Funcionario::find(2);  ID do funcionário desejado

        return view('dashboard.administrador.funcionario', compact(
            'funcionarioAutenticado',
            'funcionarios',
            'totalFuncionarios',
            'totalSalario',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recuperando o id do funcionario da sessão
        $id = session('id');

        // recuperando os dados do funcionário autenticado
        $funcionarioAutenticado = Funcionario::find($id);

        // Quantidade de Funcionários
        $totalFuncionarios = Funcionario::count();

        // Quantidade Salário
        $totalSalario = Funcionario::sum('salarioFuncionario');


        // retornando os funcionários, juntando a tabela funcionários e usuários, obtendo todos os campos da tabela funcionario e o campo email da tabela usuários
        $funcionarios = Funcionario::join('usuarios', 'funcionarios.id', '=', 'usuarios.tipo_usuario_id')
                            ->select('funcionarios.*', 'usuarios.email')
                            ->get();

        //dd($funcionarios);

        // $funcionario = Funcionario::find(2);  ID do funcionário desejado

        return view('dashboard.administrador.funcionario.create', compact(
            'funcionarioAutenticado',
            'funcionarios',
            'totalFuncionarios',
            'totalSalario',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'dataContratacao' => now(),
            'criado_em' => now(),
            'atualizado_em' => now()
        ]);

        $request->validate([
            'nomeFuncionario'           => 'required|string|max:255',
            'sobrenomeFuncionario'      => 'required|string|max:255',
            'email'                     => 'required|email|max:255',
            'foneFuncionario'           => 'required|string|max:20',
            'dataNascimentoFuncionario' => 'required|date',
            'enderecoFuncionario'       => 'required|string|max:255',
            'cidadeFuncionario'         => 'required|string|max:100',
            'estadoFuncionario'         => 'required|string|max:50',
            'cepFuncionario'            => 'required|string|max:10',
            'dataContratacao'           => 'required|date',
            'cargoFuncionario'          => 'required|string|max:100',
            'salarioFuncionario'        => 'required|numeric',
            'tipo_funcionario'          => 'required|in:administrador,assistente',
            'statusFuncionario'         => 'required|in:ativo,inativo',
            'fotoFuncionario'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ultimoFuncionario = Funcionario::latest('id')->first();
        $ultimoID = $ultimoFuncionario ? $ultimoFuncionario->idFuncionario : 0;

        $proximoID = $ultimoID + 1;


        // Criando um novo funcionário
        $funcionario = new Funcionario();

        $funcionario->nomeFuncionario               = $request->input('nomeFuncionario');
        $funcionario->sobrenomeFuncionario          = $request->input('sobrenomeFuncionario');
        $funcionario->foneFuncionario               = $request->input('foneFuncionario');
        $funcionario->dataNascFuncionario           = $request->input('dataNascimentoFuncionario');
        $funcionario->enderecoFuncionario           = $request->input('enderecoFuncionario');
        $funcionario->cidadeFuncionario             = $request->input('cidadeFuncionario');
        $funcionario->estadoFuncionario             = $request->input('estadoFuncionario');
        $funcionario->cepFuncionario                = $request->input('cepFuncionario');
        $funcionario->dataContratacaoFuncionario    = $request->input('dataContratacaoFuncionario');
        $funcionario->cargoFuncionario              = $request->input('cargoFuncionario');
        $funcionario->salarioFuncionario            = $request->input('salarioFuncionario');
        $funcionario->tipo_funcionario              = $request->input('tipo_funcionario');
        $funcionario->statusFuncionario             = $request->input('statusFuncionario');

        if ($request->hasFile('fotoFuncionario')) {
            $fotoFuncionario = $request->file('fotoFuncionario');
            $nomeArquivo = $proximoID . '_' . str_replace(' ', '_', $funcionario->nomeFuncionario) . '.' . $fotoFuncionario->getClientOriginalExtension();
            $caminhoDestino = public_path('img/funcionarios/');

            $fotoFuncionario->move($caminhoDestino, $nomeArquivo);

            $funcionario->fotoFuncionario = $nomeArquivo;
        }

        $funcionario->save();

        // Criando um novo usuário
        $usuario = new Usuario();

        $usuario->nome              = $request->input('nomeFuncionario');
        $usuario->email             = $request->input('email');
        $usuario->senha             = $request->input('senha');
        $usuario->tipo_usuario_type = $request->input('tipo_funcionario');
        $usuario->tipo_usuario_id   = $funcionario->id;
        $usuario->token_lembrete = Str::random(100);

        $usuario->save();

        Alert::success('Funcionário Cadastrado!', 'O funcionário foi cadastrado com sucesso.');

        return redirect()->route('funcionario.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
