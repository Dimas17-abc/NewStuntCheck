<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodRecommendationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StuntingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route utama
Route::get('/', function () {
    return view('welcome');
});


// Route otentikasi
Auth::routes(); // Menyediakan route untuk login, registrasi, dan reset password

// Route otentikasi khusus
Route::post('/login/credentials', [App\Http\Controllers\CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/register', [App\Http\Controllers\CustomRegisterController::class, 'register'])->name('register');
// Route Profil
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

// Route setelah login
Route::middleware('auth')->group(function () {
    Route::get('/menus/home', function () {
        return view('menus.home');
    })->name('menus.home');

    Route::get('/menus/kalkulator', function () {
        return view('menus.kalkulator');
    })->name('menus.kalkulator');


    // Route Profil
    Route::get('/profiles/setting', [ProfileController::class, 'showProfile'])->name('profiles.setting');
    Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
    Route::put('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update.name');
    Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

    // Route Kalkulator
    Route::post('/menus/kalkulator/hitung', [KalkulatorController::class, 'calculate'])->name('kalkulator.hitung');
    Route::get('/kalkulator/export-pdf', [KalkulatorController::class, 'exportPDF'])->name('kalkulator.export-pdf');
});

// Route Berita
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/menus/home', [HomeController::class, 'index'])->name('menus.home');


//Route Rekomendasi makanan
Route::get('/food-recommendations/create', [FoodRecommendationController::class, 'create'])->name('food-recommendations.create');
Route::post('/food-recommendations', [FoodRecommendationController::class, 'store'])->name('food-recommendations.store');
Route::get('/food-recommendations', [FoodRecommendationController::class, 'index'])->name('food-recommendations.index');
Route::get('/menus/home', [HomeController::class, 'index'])->name('menus.home');
// Route::post('/food-recommendations', [AdminController::class, 'storeFoodRecommendation'])->name('food-recommendations.store');




// Route::middleware(['auth', 'user-access:admin'])->prefix('/news')->group(function () {
//     Route::get('/create', [NewsController::class, 'create'])->name('news.create');
//     Route::post('/store', [NewsController::class, 'store'])->name('news.store');
//     Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
//     Route::put('/update/{id}', [NewsController::class, 'update'])->name('news.update');
// });


// Route Stunting
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::prefix('admin/stunting')->group(function () {
        Route::get('/create', [StuntingController::class, 'create'])->name('stunting.create');
        Route::post('/', [StuntingController::class, 'store'])->name('stunting.store');
    });
});

// Rute untuk Rekomendasi Makanan
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
//     Route::prefix('admin/food-recommendations')->group(function () {
//         Route::get('/create', [FoodRecommendationController::class, 'create'])->name('food-recommendations.create');
//         Route::get('/store', [FoodRecommendationController::class, 'store'])->name('food-recommendations.store');
//         Route::get('/edit/{id}', [FoodRecommendationController::class, 'edit'])->name('food-recommendations.edit');
//         Route::put('/update/{id}', [FoodRecommendationController::class, 'update'])->name('food-recommendations.update');
//     });
// });


// Route Admin
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/download-users', [AdminController::class, 'downloadUsers'])->name('admin.download-users');
    Route::get('/download-users', [AdminController::class, 'downloadUsers'])->name('admin.download-users');
});

// Route Pengguna
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/regis', [HomeController::class, 'index'])->name('regis');
});
