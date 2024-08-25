<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function edit()
    {
        // Tampilkan formulir untuk memperbarui berita
        return view('news.edit');
    }

    public function update(Request $request)
    {
        // Logika untuk memperbarui berita
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Simpan perubahan ke dalam database
        // Misalnya, mencari berita berdasarkan ID dan memperbarui isinya
        $news = News::find($request->id);
        $news->update($validated);

        // Redirect atau beri umpan balik kepada pengguna
        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }
}
