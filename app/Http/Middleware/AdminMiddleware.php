<?php

namespace App\Http\Middleware;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    // }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is == 1 || auth()->user()->is == 2){
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
