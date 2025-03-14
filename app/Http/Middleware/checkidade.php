<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkidade
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('check') && $request->input('check') <= 20) {
            // Redireciona para a rota 'home' — supondo que esta rota existe
            return redirect()->route('home');
        }

        return $next($request);
    }
}
