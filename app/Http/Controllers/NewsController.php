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
        // Validasi input dari form
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'sumber' => 'nullable|url',
            'foto_makanan' => 'nullable|image|max:2048',
        ]);

        // Cek apakah ada file gambar yang di-upload
        if ($request->hasFile('foto_makanan')) {
            $validated['foto_makanan'] = $request->file('foto_makanan')->store('news_images', 'public');
        }

        // Membuat berita baru dengan data yang divalidasi
        News::create($validated);

        // Redirect ke halaman index berita dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Cari berita berdasarkan ID
        $news = News::findOrFail($id);

        // Tampilkan formulir untuk memperbarui berita
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'sumber' => 'nullable|url',
            'data_stunting' => 'nullable|integer',
            'rekomendasi_makanan' => 'nullable|string|max:255',
            'foto_makanan' => 'nullable|image|max:2048',
            'sumber_makanan' => 'nullable|url',
        ]);

        // Cek apakah ada file gambar baru yang di-upload
        if ($request->hasFile('foto_makanan')) {
            $validated['foto_makanan'] = $request->file('foto_makanan')->store('foto_makanans', 'public');
        }

        // Cari berita berdasarkan ID dan perbarui isinya
        $news = News::findOrFail($id);
        $news->update($validated);

        // Redirect ke halaman index berita dengan pesan sukses
        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
    }
}
