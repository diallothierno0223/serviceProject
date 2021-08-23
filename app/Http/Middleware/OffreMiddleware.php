<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OffreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->profil->name == 'offre'){
            return $next($request);
        } else {
            abort(403, "acces non autoriser");
        }
    }
}
