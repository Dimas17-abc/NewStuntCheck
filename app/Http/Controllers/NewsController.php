<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\FoodRecommendation;

class NewsController extends Controller
{
    // Menampilkan form untuk membuat berita baru
    public function create()
    {
        return view('news.create');
    }

    // Menyimpan berita baru ke dalam database
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

        // Jika ada file gambar, simpan
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->save(); // Simpan berita baru

        // Redirect setelah menyimpan
        return redirect()->route('admin.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan semua berita
    public function index()
    {
        $news = News::all(); // Ambil semua berita
        return view('news.index', compact('news')); // Kirim data ke view
    }

    // Menampilkan semua berita dan rekomendasi makanan di halaman admin
    public function adminIndex()
    {
        $news = News::all(); // Ambil semua berita
        $foodRecommendations = FoodRecommendation::all(); // Ambil semua rekomendasi makanan
        return view('admin.index', compact('news', 'foodRecommendations')); // Kirim variabel ke view
    }

    // Menampilkan form untuk mengedit berita berdasarkan ID
    public function edit($id)
    {
        $newsItem = News::findOrFail($id); // Mengambil berita berdasarkan ID
        return view('news.edit', compact('newsItem')); // Menampilkan view edit
    }

    // Memperbarui berita yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $newsItem = News::findOrFail($id); // Mengambil berita berdasarkan ID
        $newsItem->title = $request->input('title');
        $newsItem->description = $request->input('description');
        $newsItem->source = $request->input('source');

        // Jika ada file gambar baru, simpan
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $newsItem->image = $imagePath;
        }

        $newsItem->save(); // Simpan perubahan

        // Redirect setelah menyimpan perubahan
        return redirect()->route('admin.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // Menghapus berita berdasarkan ID
    public function destroy($id)
    {
        $newsItem = News::findOrFail($id); // Mengambil berita berdasarkan ID
        $newsItem->delete(); // Hapus berita

        // Redirect setelah menghapus
        return redirect()->route('admin.index')->with('success', 'Berita berhasil dihapus.');
    }
}
