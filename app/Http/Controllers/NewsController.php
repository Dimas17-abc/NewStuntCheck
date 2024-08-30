<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Hash;
use Auth;

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image')
            ? $request->file('image')->store('news_images', 'public')
            : null; // Simpan gambar jika ada
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'source' => $request->input('source', 'default_source_value'),
            'image' => $imagePath,
        ]);

        return redirect()->route('menus.home')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function index()
    {
        $news = News::all();
        return view('menus.home', compact('news'));
    }
}
