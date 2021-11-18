<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Role as Middleware;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $civitas_id)
    {
        if (!Auth::check()) 
            return redirect('/home');

        $user = Auth::user();
        if ($user->civitas_id == $civitas_id)
            return $next($request);

        return redirect('/home');
    }
}
