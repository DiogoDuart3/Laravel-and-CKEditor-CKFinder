<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CKFinderAuthentication
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
        return true;
//        dd($request);
////        dd($_SESSION['isLoggedIn']);
//        config(['ckfinder.authentication' => function () {
//            return true;
//        }]);
//        return $next($request);
    }
}
