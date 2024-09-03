<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomRegisterController;
use App\Http\Controllers\FoodRecommendationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\PDFAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdmin;

// Route utama
Route::get('/', function () {
    return view('welcome');
});

// Route otentikasi
Auth::routes(); // Menyediakan route untuk login, registrasi, dan reset password

// Route otentikasi khusus
Route::post('/login/credentials', [CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/register', [CustomRegisterController::class, 'register'])->name('register');

// Route Profil
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

// Rute yang Memerlukan Otentikasi
Route::middleware('auth')->group(function () {
    // Route utama
    Route::get('/menus/home', [HomeController::class, 'index'])->name('menus.home');
    Route::get('/menus/kalkulator', [KalkulatorController::class, 'index'])->name('menus.kalkulator');
    
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
Route::middleware([CheckAdmin::class])->group(function () {
    Route::prefix('news')->group(function () {
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/', [NewsController::class, 'store'])->name('news.store');
        Route::get('/', [NewsController::class, 'index'])->name('news.index');
        Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');   
        Route::put('/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    });
});
// Route Rekomendasi Makanan
Route::middleware([CheckAdmin::class])->group(function () {
Route::prefix('food-recommendations')->group(function () {
    Route::get('/create', [FoodRecommendationController::class, 'create'])->name('food-recommendations.create');
    Route::post('/', [FoodRecommendationController::class, 'store'])->name('food-recommendations.store');
    Route::get('/', [FoodRecommendationController::class, 'index'])->name('food-recommendations.index');
    Route::get('/{id}/edit', [FoodRecommendationController::class, 'edit'])->name('food-recommendations.edit');
    Route::put('/{id}', [FoodRecommendationController::class, 'update'])->name('food-recommendations.update');
    Route::delete('/{id}', [FoodRecommendationController::class, 'destroy'])->name('food-recommendations.destroy');
});
});

// Route Stunting
// Route::prefix('stunting')->group(function () {
//     Route::get('/create', [StuntingController::class, 'create'])->name('stunting.create');
//     Route::post('/', [StuntingController::class, 'store'])->name('stunting.store');
// });

// // Middleware untuk akses admin
// Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    //     // Rute untuk mengunduh data pengguna dalam bentuk PDF
    //     Route::get('/download-users-pdf', [PDFAdminController::class, 'downloadUsersPDF'])->name('admin.download-users-pdf');
//     // Rute untuk ekspor PDF kalkulator
//     Route::get('/export-pdf', [PDFAdminController::class, 'exportPDF'])->name('admin.export-pdf');
// });


Route::get('/admin/download-pdf', [PDFAdminController::class, 'downloadPdf'])->name('admin.downloadPdf');

    

// Route Pengguna dengan middleware user
// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/regis', [HomeController::class, 'index'])->name('regis');
// });