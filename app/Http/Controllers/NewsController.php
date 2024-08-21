<?php

namespace App\Http\Controllers;
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class NewsController extends Controllers;
{
    public function edit()
    {
        // Tampilkan formulir untuk memperbarui berita
        return view('news.edit');
    }

    public function update(Request $request)
    {
        // Logika untuk memperbarui berita
        // Validasi dan simpan perubahan
        // Redirect atau beri umpan balik
    }
}

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403);
        }
        return $next($request);
    }
}
