<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // Configura o locale para português do Brasil em todo o controlador
        Carbon::setLocale('pt_BR');

        // Timezone de Brasília
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index()
    {

        $id = session('id');


        $funcionarioAutenticado = Funcionario::find($id);


        $contatos = Contato::orderBy('id', 'desc')->get();

        return view('dashboard.administrador.mensagem', compact(
            'funcionarioAutenticado',
            'contatos',
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
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        //
    }
}
