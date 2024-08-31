<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\FoodRecommendation;
use Illuminate\Support\Facades\Auth;
use PDF; // Pastikan ini adalah namespace yang benar untuk PDF

class AdminController extends Controller
{
    public function __construct()
    {
        // Memastikan hanya admin yang bisa mengakses controller ini
        $this->middleware('auth');
        $this->middleware('CheckAdmin'); // Middleware untuk akses admin
    }

    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Mengambil semua berita terbaru
        $news = News::all();

        // Mengambil semua rekomendasi makanan
        $foodRecommendations = FoodRecommendation::all();

        // Mengirim semua data ke view 'menus.home'
        return view('menus.home', [
            'news' => $news,
            'foodRecommendations' => $foodRecommendations
        ]);
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'source' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->source = $request->source;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $news->image = basename($path);
        }

        $news->save();

        return redirect()->route('menus.home')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menyimpan rekomendasi makanan baru
    public function storeFoodRecommendation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $foodRecommendation = new FoodRecommendation();
        $foodRecommendation->name = $request->name;
        $foodRecommendation->description = $request->description;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('food_recommendations', 'public');
            $foodRecommendation->photo = basename($path);
        }

        $foodRecommendation->save();

        return redirect()->route('menus.home')->with('success', 'Rekomendasi makanan berhasil ditambahkan.');
    }

    // Download data user dalam bentuk PDF
    public function downloadUsersPDF()
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.users', compact('users'));

        return $pdf->download('users.pdf');
    }

    // Menampilkan halaman form berita baru
    public function createNews()
    {
        return view('news.create');
    }

    // Menampilkan halaman form rekomendasi makanan baru
    public function createFoodRecommendation()
    {
        return view('food_recommendations.create');
    }
}
