<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

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

        // Obtenha todos os funcionários do banco de dados com paginação
        // $funcionarios = $this->funcionario->all();
        // $funcionariosComUsuarios = Funcionario::with('usuario')->get();
        // dd($funcionariosComUsuarios);

        $funcionario = Funcionario::find(2); // Substitua 2 pelo ID do funcionário desejado
        $usuario = $funcionario->usuario;
        dd($usuario);


        // Obtendo o email do usuário associado
        $emailsUsuarios = Funcionario::with('usuario')->get()->pluck('usuario.senha');
        // dd($emailsUsuarios);

        // Passa a lista de funcionários e a lista de emails dos usuários para a view
        return view('dashboard.administrador.funcionario', compact(
            'funcionarioAutenticado',
            'funcionarios',
            'emailsUsuarios',
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
        //
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
