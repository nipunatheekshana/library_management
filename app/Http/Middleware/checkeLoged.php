<?php

namespace App\Http\Middleware;

use App\Http\Controllers\loginController;
use Closure;
use Illuminate\Http\Request;

class checkeLoged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('userId')){
            return redirect('/log');
        }
        else{
            return $next($request);
        }
    }
}
