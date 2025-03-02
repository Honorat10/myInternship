<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Vérifie si l'utilisateur est authentifié et si son rôle correspond à celui passé en paramètre
        if (Auth::check() && Auth::user()->role === $role) {
            // Si l'utilisateur a le bon rôle, permettre la demande
            return $next($request);
        }

        // Si l'utilisateur n'a pas le bon rôle, redirige-le ailleurs (par exemple vers la page d'accueil)
        return redirect('/');  // Redirige vers la page d'accueil ou vers une autre route
    }
}
