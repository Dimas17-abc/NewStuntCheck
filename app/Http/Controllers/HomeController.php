<?php 

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\FoodRecommendation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Middleware 'auth' diterapkan untuk semua method
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin')->only('adminIndex'); // Hanya untuk halaman admin
    }

    // Tampilan utama untuk user biasa
    public function index(): View
    {
        // Ambil data berita dan rekomendasi makanan
        $news = News::all();
        $foodRecommendations = FoodRecommendation::all();

        // Kirim data ke tampilan menus.home
        return view('menus.home', [
            'news' => $news,
            'foodRecommendations' => $foodRecommendations
        ]);
    }

    // Tampilkan halaman registrasi
    public function showRegis(): View
    {
        return view('regis');
    }

    // Hanya admin yang bisa mengakses ini, gunakan CheckAdmin middleware
    public function adminIndex(): View
    {
        // Pastikan hanya admin yang bisa mengakses halaman ini
        return view('admin.index');
    }

    // Tampilkan profil user
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('profiles.setting', compact('user'));
    }

    public function all()
    {
        return view('menus.all');
    }
}
