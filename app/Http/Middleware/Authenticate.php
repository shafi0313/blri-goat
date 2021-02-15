<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // public function __construct(Guard $auth)
    // {
    //     $this->auth = $auth;
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;

        return parent::handle($request, $next, ...$guards);
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         $guard = $this->guards[0];
    //         switch ($guard) {
    //             case 'admin':
    //                 $route = 'admin.login';
    //                 break;
    //             default:
    //                 $route = 'login';
    //         }
    //         return route($route);
    //     }
    // }

}
