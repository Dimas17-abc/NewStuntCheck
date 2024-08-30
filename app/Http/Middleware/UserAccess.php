<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (Auth::check() && Auth::user()->type === $userType) {
            return $next($request);
        }

        // Pastikan Anda tidak mengarahkan kembali ke rute yang juga memiliki middleware ini
        return redirect()->route('menus.home')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

    
    // public function handle(Request $request, Closure $next, $userType): Response
    // {
    //     if(auth()->user()->type == $userType){
    //         return $next($request);
    //     }

    //     return response()->json(['You do not have permission to access for this page.']);
    // }
}
