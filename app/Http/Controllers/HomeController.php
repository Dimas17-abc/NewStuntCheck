<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\FoodRecommendation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        // Ambil data dari model
        $news = News::all();
        $foodRecommendations = FoodRecommendation::all();

        // Kirim data ke tampilan
        return view('menus.home', [
            'news' => $news,
            'foodRecommendations' => $foodRecommendations
        ]);
    }
    public function showRegis(): View
    {
        return view('regis');
    }

    public function adminHome(): View
    {
        return view('admin.home');
    }
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('profiles.setting', compact('user'));
    }
}
