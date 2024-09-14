<?php

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\FoodRecommendationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PDFAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\AdminController;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Route otentikasi
Auth::routes(); // Route untuk login, register, reset password

// Route login dan register custom
// Route::post('/login/credentials', [CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/login/credentials', [CustomLoginController::class, 'login'])->name('login.credentials');
Route::post('/register', [CustomRegisterController::class, 'register'])->name('register');


Route::middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin', [NewsController::class, 'adminIndex'])->name('admin.index');
    Route::get('/admin/download-pdf', [PDFAdminController::class, 'downloadUsersPDF'])->name('admin.downloadPdf');
});

Route::get('/home', [HomeController::class, 'index'])->name('menus.home');
Route::get('/home', [NewsController::class, 'index'])->name('home');

Route::get('/menus/all', [HomeController::class, 'all
'])->name('menus.all');


// Route Profil: Sign In dan Sign Up
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');
Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

// Route yang memerlukan otentikasi
Route::middleware('auth')->group(function () {
    // Route Menu Utama untuk user
    Route::get('/home', [HomeController::class, 'index'])->name('menus.home');
    Route::get('/menus/kalkulator', [KalkulatorController::class, 'index'])->name('menus.kalkulator');
    Route::post('/menus/kalkulator/hitung', [KalkulatorController::class, 'calculate'])->name('kalkulator.hitung');
    Route::get('/kalkulator/export-pdf', [KalkulatorController::class, 'exportPDF'])->name('kalkulator.export-pdf');

    // Route Profil
    Route::get('/profiles/setting', [ProfileController::class, 'showProfile'])->name('profiles.setting');
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::put('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update.name');
    Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');


    // Route Berita
    Route::prefix('news')->group(function () {
    // Menampilkan form untuk membuat berita
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    
    // Menyimpan berita baru ke dalam database
    Route::post('/', [NewsController::class, 'store'])->name('news.store');
    
    // Menampilkan daftar semua berita
    Route::get('/', [NewsController::class, 'index'])->name('news.index'); // Disesuaikan menjadi /news tanpa duplikasi /news/news
    
    // Menampilkan form untuk mengedit berita berdasarkan id
    Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    
    // Memperbarui berita berdasarkan id
    Route::put('/{id}', [NewsController::class, 'update'])->name('news.update');
    
    // Menghapus berita berdasarkan id
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});


    // Route Rekomendasi Makanan
    Route::prefix('food-recommendations')->group(function () {
        Route::get('/create', [FoodRecommendationController::class, 'create'])->name('food-recommendations.create');
        Route::post('/', [FoodRecommendationController::class, 'store'])->name('food-recommendations.store');
        Route::get('/', [FoodRecommendationController::class, 'index'])->name('food-recommendations.index');
        Route::get('/{id}/edit', [FoodRecommendationController::class, 'edit'])->name('food-recommendations.edit');
        Route::put('/{id}', [FoodRecommendationController::class, 'update'])->name('food-recommendations.update');
        Route::delete('/{id}', [FoodRecommendationController::class, 'destroy'])->name('food-recommendations.destroy');
        // Route::resource('food-recommendations', FoodRecommendationController::class);
    });

    // Route Admin Dashboard untuk PDF download
    Route::prefix('admin')->group(function () {
        Route::get('/downloadPDF', [AdminController::class, 'downloadPDF'])->name('admin.downloadPDF');
    });
});
