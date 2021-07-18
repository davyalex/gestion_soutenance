<?php

namespace App\Http\Middleware;

use Closure;

class Role
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
        if (Auth::user() && Auth::user()->role==0 OR Auth::user()->email=='alexkouamelan96@gmail.com') {
            return $next($request);
        }
        return redirect('/')->with('error','Page non autorisé');
    }
}
