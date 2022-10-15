<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Rememberme
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
         $value = $request->cookie('remember_me');
         //dd($value);
        if(empty($value))
        {
            if(empty(session('id')))
            {
                return redirect('login');
            }
        }return $next($request);
    }
}
