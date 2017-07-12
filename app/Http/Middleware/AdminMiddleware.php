<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
      if(Auth::check() && Auth::user()->level == 'admin'){
        return $next($request);
      }else if(Auth::check()){
        return redirect('/home');
      }else{
        return redirect('/');
      }
    }
}
