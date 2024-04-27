<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class VerificarAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar se o usuário é administrador
        dd(session('tipoFuncionario'));
        if (session('tipoFuncionario') !== 'administrador') {

             dd('chegou aqui, ele é assistente');

            return redirect()->route('login')->withErrors('Acesso restrito para administradores.');
        }


        //dd('chegou aqui, ele é adm');
        return $next($request);
    }
}
