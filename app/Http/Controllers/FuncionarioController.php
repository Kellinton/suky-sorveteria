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
        // Obtenha todos os funcionários do banco de dados com paginação
        $funcionarios = $this->funcionario->all();

        // Obtenha apenas os emails dos usuários do banco de dados
        $emailsUsuarios = Usuario::pluck('emailUsuario');

        // Passa a lista de funcionários e a lista de emails dos usuários para a view
        return view('dashboard.administrador.funcionario', [
            'funcionarios' => $funcionarios,
            'emailsUsuarios' => $emailsUsuarios
        ]);
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
