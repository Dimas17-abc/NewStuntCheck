<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 1) {
            return $next($request);
        }

        return redirect()->route('menus.home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}

