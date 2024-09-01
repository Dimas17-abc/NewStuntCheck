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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $foodRecommendation = new FoodRecommendation();
        $foodRecommendation->title = $request->input('title');
        $foodRecommendation->description = $request->input('description');
        $foodRecommendation->source = $request->input('source');    
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $foodRecommendation->image = $imagePath;
        }
    
        $foodRecommendation->save();
    

        // Redirect setelah menyimpan
        return redirect()->route('menus.home')->with('success', 'Rekomendasi makanan berhasil ditambahkan.');
    }

    // Menampilkan semua rekomendasi makanan
    public function index()
    {
        $foodRecommendations = FoodRecommendation::all();
        return view('menus.home', compact('foodRecommendations'));
    }

    public function edit($id)
    {
        $foodRecommendation = FoodRecommendation::findOrFail($id);
        return view('food-recommendations.edit', compact('foodRecommendation'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $foodRecommendation = FoodRecommendation::findOrFail($id);
        $foodRecommendation->title = $request->input('title');
        $foodRecommendation->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('food_images', 'public');
            $foodRecommendation->image = $imagePath;
        }

        $foodRecommendation->save();

        return redirect()->route('menus.home')->with('success', 'Rekomendasi makanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $foodRecommendation = FoodRecommendation::findOrFail($id);
        $foodRecommendation->delete();

        return redirect()->route('menus.home')->with('success', 'Rekomendasi makanan berhasil dihapus.');
    }
}
