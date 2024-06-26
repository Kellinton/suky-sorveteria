<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIsFuncionario
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
        $user = Auth::user();

        if ($user && ($user->tipo_usuario_type === 'administrador' || $user->tipo_usuario_type === 'assistente')) {
            return $next($request);
        }

        return response()->json(['message' => 'Acesso negado. Somente administradores e assistentes podem acessar esta área.'], 403);
    }
}
