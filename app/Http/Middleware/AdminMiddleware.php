<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. On vérifie si l'utilisateur est bien connecté
        // 2. On vérifie si son rôle est 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // L'accès est autorisé
        }

        // Si l'utilisateur n'est pas admin, on le redirige vers l'accueil
        return redirect('/')->with('error', "Accès refusé : vous n'êtes pas administrateur.");
    }
}