<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\FoodRecommendation;

class FoodRecommendationController extends Controller
{
    // public function index()
    // {
    //     // Ambil data rekomendasi makanan dari database
    //     $foodRecommendations = FoodRecommendation::all();

    //     // Kirim data ke view
    //     return view('menus.home', compact('foodRecommendations'));
    // }

    public function create()
    {
        return view('food-recommendations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $foodRecommendation = new FoodRecommendation();
        $foodRecommendation->title = $request->title;
        $foodRecommendation->content = $request->content;
        $foodRecommendation->source = $request->source;

        
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('food_recommendations', 'public');
        $foodRecommendation->image = basename($path);
    }

    $foodRecommendation->save();

    return redirect()->route('menus.home')->with('success', 'Rekomendasi makanan berhasil ditambahkan.');
}

    public function index()
    {
        $foodRecommendations = FoodRecommendation::all();
        return view('menus.home', compact('foodRecommendations'));
    }
    // public function showRecommendations()
    // {
    //     $foodRecommendations = FoodRecommendation::all(); // Ambil semua rekomendasi makanan dari database
    //     return view('menus.home', compact('foodRecommendations'));
    // }
}
