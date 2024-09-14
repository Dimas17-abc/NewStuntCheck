<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Models\FoodRecommendation;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        // Middleware auth untuk memastikan user sudah login
        $this->middleware('auth');
        // Middleware CheckAdmin untuk memeriksa apakah user adalah admin
        $this->middleware(\App\Http\Middleware\CheckAdmin::class);
    }

    // Menampilkan halaman dashboard admin
    public function index()
    {
        // Mengambil total berita, rekomendasi makanan, dan pengguna
        $totalBerita = News::count();
        $totalRekomendasi = FoodRecommendation::count();
        $totalUser = User::count();

        // Mengirim data ke view admin.index
        return view('admin.index', compact('totalBerita', 'totalRekomendasi', 'totalUser'));
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

        return redirect()->route('admin.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menyimpan rekomendasi makanan baru
    public function storeFoodRecommendation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
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

        return redirect()->route('admin.index')->with('success', 'Rekomendasi makanan berhasil ditambahkan.');
    }

    // Download data user dalam bentuk PDF
    public function downloadUsersPDF()
    {
        $users = User::all();
        $pdf = 'PDF'::loadView('pdf.users', compact('users'));

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
