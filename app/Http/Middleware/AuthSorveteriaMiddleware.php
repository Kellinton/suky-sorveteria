<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use App\Models\Funcionario;
use Closure;
use Illuminate\Http\Request;

class AuthSorveteriaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $tipoUser)
    {

        $email = session('email');

        //dd($email);

        if($email){

            $usuario = Usuario::where('email', $email)->first();

            if(!$usuario) {
                return redirect()->route('login')->withErrors(['email' => 'Não autenticado']);
            }

            $tipoUsuario = $usuario->tipo_usuario;

            if($tipoUsuario){
                $tipoFuncionario = null;

                if($tipoUsuario instanceof Funcionario) {
                    // dd($tipoUsuario); // informações do funcionário logado
                    $tipoFuncionario = $tipoUsuario->tipo_funcionario;
                    $nome =  $tipoUsuario->nomeFuncionario;
                    $sobrenome =  $tipoUsuario->sobrenomeFuncionario;
                    $cargo = $tipoUsuario->cargoFuncionario;

                    // Armazenando as informações do funcionário na sessão para poder acessar em outras views

                    session([
                        'nomeFuncionario'       => $nome,
                        'sobrenomeFuncionario'  => $sobrenome,
                        'cargoFuncionario'      => $cargo,
                        'tipoFuncionario'       => $tipoFuncionario
                    ]);
                }
            }

            // $tipoUser = session('tipo_usuario');


            if($tipoFuncionario === $tipoUser){
                session(['tipo_usuario_id' => $usuario->tipo_usuario_id]);

                // dd($tipoFuncionario);
                return $next($request);


            }else{

                return back()->withErrors(['email' => 'Acesso não autorizado.']);

            }

         }
    }
}
