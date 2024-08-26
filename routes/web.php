<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Profil Routes
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

Route::middleware('auth')->group(function () {
    Route::get('/menus/home', function () {
        return view('menus.home');
    })->name('menus.home');

    Route::get('/menus/kalkulator', function () {
        return view('menus.kalkulator');
    })->name('menus.kalkulator');

    // Profile Routes
    Route::middleware('auth')->group(function () {
        Route::get('/profiles/setting', [ProfileController::class, 'showProfile'])->name('profiles.setting');
        Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
        Route::put('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update.name');
        Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
        Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    });
    // Kalkulator Routes
    Route::post('/menus/kalkulator/hitung', [KalkulatorController::class, 'calculate'])->name('kalkulator.hitung');
    Route::get('/kalkulator/export-pdf', [KalkulatorController::class, 'exportPDF'])->name('kalkulator.export-pdf');
});

// News Routes
Route::middleware('admin')->group(function () {
    Route::get('/news/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update', [NewsController::class, 'update'])->name('news.update');
});

// Authentication Routes
Auth::routes(); // Includes login, registration, and password reset routes

// User Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/regis', [HomeController::class, 'index'])->name('regis');
});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware('admin')->group(function () {
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/stunting/create', [StuntingController::class, 'create'])->name('stunting.create');
    Route::post('/admin/stunting', [StuntingController::class, 'store'])->name('stunting.store');
    Route::get('/admin/rekomendasi/create', [RekomendasiController::class, 'create'])->name('rekomendasi.create');
    Route::post('/admin/rekomendasi', [RekomendasiController::class, 'store'])->name('rekomendasi.store');
});

Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
Route::get('food-recommendations/create', [FoodRecommendationsController::class, 'create'])->name('food-recommendations.create');
Route::get('admin/download-users', [AdminController::class, 'downloadUsers'])->name('admin.download-users');



// Custom Authentication Routes
Route::post('/login/credentials', [App\Http\Controllers\CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/register', [App\Http\Controllers\CustomRegisterController::class, 'register'])->name('register');