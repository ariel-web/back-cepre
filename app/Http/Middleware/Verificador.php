<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Verificador
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
        $blockAccess = true;      
        if(auth()->user()->rol === 1)$blockAccess = false;

        if($blockAccess){
            return back()->with('message', ['danger', 'No tienes permisos de verifiación de datos']);
        }
        return $next($request);
    }
}
