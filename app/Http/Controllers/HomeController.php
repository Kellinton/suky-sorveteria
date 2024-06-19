<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Contato;
use App\Mail\ContatoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {


            $produtos = Produto::orderBy('id', 'desc')->get();

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

    public function salvarNoBanco(Request $request)
    {
        //dd($request->all());
        // Extrai os dados JSON da requisição
          $dados = $request->all();

    //   dd($dados);


        // Valida os dados recebidos
        $validarDados = Validator::make($dados, [
            'nomeContato'       => 'required|max:50',
            'emailContato'      => 'required|email|max:100',
            'foneContato'       => 'required|max:15',
            'assuntoContato'    => 'required|max:100',
            'mensagemContato'   => 'required',
        ]);



        // Verifica se houve falha na validação
        if ($validarDados->fails()) {

            $errorMessages = implode( $validarDados->errors()->all());

            // Exibir a mensagem de erro usando SweetAlert
            Alert::error('Erro na validação!', 'Por favor, corrija os seguintes erros: ' . $errorMessages);


            // Alert::error('Erro na validação!', 'Por favor, corrija os erros no formulário.');
            return back()->withErrors($validarDados)->withInput();

        } else {
            // Cria um novo registro de contato no banco de dados
			$contato = Contato::create($validarDados->validated());

            // Envia e-mail
            // try {
            //     Mail::to('codeforgegroup@gmail.com')->send(new ContatoEmail($contato));

            // } catch (\Exception $e) {
            //     // Em caso de erro no envio do e-mail, retorna uma resposta de erro
            //     Alert::error('Mensagem não enviada!', 'Erro ao enviar o Email.');
			// 	return back()->with('error', 'Erro ao enviar e-mail.', 500);
            // }


            Alert::success('Email Enviado!', 'Email registrado com sucesso');
            // Retorna uma resposta de sucesso
           return back()->with('success', 'Email registrado com sucesso');
        }
    }


}
