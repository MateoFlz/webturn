<?php

namespace App\Http\Middleware;

use App\Rol;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Superadmin
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
        if(Auth::user()->id_rol != 1){
            Session::flash('message', 'Alctualmente no cuenta con permisos para acceder');
            return redirect()->to('/home');
        }
        return $next($request);
    }
}
