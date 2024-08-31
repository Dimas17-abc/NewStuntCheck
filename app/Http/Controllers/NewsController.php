<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

       $news = new News();
       $news->title = $request->input('title');
       $news->description = $request->input('description');
       $news->source = $request->input('source');

    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
           $news->image = $imagePath;
        }
    
       $news->save();

        // Redirect setelah menyimpan
        return redirect()->route('menus.home')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function index()
    {
        $news = News::all();
        return view('menus.home', compact('news'));
    }
}
