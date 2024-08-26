<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role == 'admin') {
            return $next($request);
        }
    
        return redirect('/menus/home')->with('error', "Anda tidak memiliki akses ke halaman ini.");
    }
}
