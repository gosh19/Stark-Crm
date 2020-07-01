<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

use Closure;

class Admin
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
        if (Auth::user()->rol == 'admin') {
            return $next($request);
        }
        return redirect('/');
    }
}
