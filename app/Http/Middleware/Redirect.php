<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class Redirect
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
            $redirect = RouteServiceProvider::INDEX;
            switch (Auth::user()->rol) {
                case 'admin':
                    $redirect = RouteServiceProvider::ADMIN;
                    break;
                case 'operario':
                    $redirect = RouteServiceProvider::OPERARIO;
                    break;
                default:
                    # code...
                    break;
            }
        }else{

            $redirect = RouteServiceProvider::LOGIN;
        }
        
        return redirect($redirect);
    }
}
