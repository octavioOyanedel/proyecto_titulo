<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class UserAdmin
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
        if(Auth::user()->rol_id === 'Administrador' || Auth::user()->rol_id === 'Usuario'){
            return $next($request);
        }
        return redirect('home');
    }
}
