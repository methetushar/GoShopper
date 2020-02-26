<?php

namespace App\Http\Middleware;

use Closure;

class CustomMiddleware
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
       if (session()->get('username')){
           return $next($request);
       }else{

           return redirect('/admin');
       }



    }
}
