<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\FoodRecommendation;

class NewsController extends Controller
{
    /**
     * Tampilkan form untuk membuat berita baru
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Simpan berita baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buat instance baru untuk model News
        $news = new News();
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->source = $request->input('source');

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->save(); // Simpan berita ke database

        // Redirect ke halaman admin.index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Tampilkan daftar berita untuk user
     */
    public function index()
    {
        $news = News::all(); // Mengambil semua berita
        return view('news.index', compact('news')); // Kirim data berita ke view
    }

    /**
     * Tampilkan detail berita berdasarkan ID
     */
    public function show($id)
    {
        $newsItem = News::findOrFail($id); // Cari berita berdasarkan ID
        return view('news.show', compact('newsItem')); // Kirim data berita ke view
    }

    /**
     * Tampilkan halaman admin dengan daftar berita dan rekomendasi makanan
     */
    public function adminIndex()
    {
        $news = News::all(); // Ambil semua berita
        $foodRecommendations = FoodRecommendation::all(); // Ambil semua rekomendasi makanan
        return view('admin.index', compact('news', 'foodRecommendations')); // Kirim data ke view
    }

    /**
     * Tampilkan form untuk mengedit berita berdasarkan ID
     */
    public function edit($id)
    {
        $newsItem = News::findOrFail($id); // Cari berita berdasarkan ID
        return view('news.edit', compact('newsItem')); // Kirim data berita ke view
    }

    /**
     * Perbarui berita di database
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newsItem = News::findOrFail($id); // Cari berita berdasarkan ID
        $newsItem->title = $request->input('title');
        $newsItem->description = $request->input('description');
        $newsItem->source = $request->input('source');

        // Simpan gambar baru jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $imagePath;
        }

        $newsItem->save(); // Simpan perubahan berita

        // Redirect ke halaman admin.index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita dari database
     */
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id); // Cari berita berdasarkan ID
        $newsItem->delete(); // Hapus berita

        // Redirect ke halaman admin.index dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Berita berhasil dihapus.');
    }
}
