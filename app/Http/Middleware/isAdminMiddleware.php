<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdminMiddleware
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
        if (Auth::check()){
            // Admin role is 1
            // User role is 0

            if(Auth::user()->role_id == '1'){
                return $next($request);
            }
            else{
                return redirect('/') -> with('message', 'Acess Denied');
            }
        } 
        else{
            return redirect('/blog/login') -> with('message', 'Acess Denied.You need to login');
        }
        return $next($request);
    }
}
