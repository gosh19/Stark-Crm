<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Operario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if ((Auth::user()->rol == 'operario') || (Auth::user()->rol == 'admin')) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
