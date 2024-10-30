<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodRecommendation;

class FoodRecommendationController extends Controller
{
    // Menampilkan halaman untuk membuat rekomendasi makanan baru
    public function create()
    {
        return view('food-recommendations.create');
    }

    // Menyimpan rekomendasi makanan baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Membuat instance baru dari FoodRecommendation
        $foodRecommendation = new FoodRecommendation();
        $foodRecommendation->title = $request->input('title');
        $foodRecommendation->description = $request->input('description');
        $foodRecommendation->source = $request->input('source');

        // Memeriksa apakah ada gambar yang di-upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public'); // Menyimpan gambar ke storage
            $foodRecommendation->image = $imagePath; // Simpan path ke database
        }

        $foodRecommendation->save(); // Simpan ke database

        // Redirect setelah menyimpan ke halaman admin.index
        return redirect()->route('admin.index')->with('success', 'Rekomendasi makanan berhasil ditambahkan.');
    }

    // Menampilkan semua rekomendasi makanan
    public function index()
    {
        $foodRecommendations = FoodRecommendation::all();
        return view('menus.home', compact('foodRecommendations'));
    }

    // Menampilkan halaman untuk mengedit rekomendasi makanan
    public function edit($id)
    {
        $foodRecommendation = FoodRecommendation::findOrFail($id);
        return view('food-recommendations.edit', compact('foodRecommendation'));
    }

    // Memperbarui rekomendasi makanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'source' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        $foodRecommendation = FoodRecommendation::findOrFail($id);
        $foodRecommendation->title = $request->input('title');
        $foodRecommendation->description = $request->input('description');
        $foodRecommendation->source = $request->input('source');

        // Memeriksa apakah ada gambar baru yang di-upload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($foodRecommendation->image) {
                \Storage::disk('public')->delete($foodRecommendation->image); // Hapus gambar lama dari storage
            }
            $imagePath = $request->file('image')->store('food_images', 'public'); // Menyimpan gambar baru
            $foodRecommendation->image = $imagePath; // Simpan path baru ke database
        }

        $foodRecommendation->save(); // Simpan ke database

        // Redirect setelah diperbarui ke halaman admin.index
        return redirect()->route('admin.index')->with('success', 'Rekomendasi makanan berhasil diperbarui.');
    }

    // Menghapus rekomendasi makanan
    public function destroy($id)
    {
        $foodRecommendation = FoodRecommendation::findOrFail($id);
        
        // Hapus gambar dari storage jika ada
        if ($foodRecommendation->image) {
            \storage::disk('public')->delete($foodRecommendation->image); // Menghapus gambar dari storage
        }
        
        $foodRecommendation->delete(); // Menghapus dari database

        // Redirect setelah dihapus ke halaman admin.index
        return redirect()->route('admin.index')->with('success', 'Rekomendasi makanan berhasil dihapus.');
    }
}
