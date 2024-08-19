<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\CustomUserRegisterController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Route untuk halaman sign-in dan sign-up
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

// Route untuk menu
Route::get('/menus/home', function () {
    return view('menus.home');
})->name('menus.home');

Route::get('/menus/kalkulator', function () {
    return view('menus.kalkulator');
})->name('menus.kalkulator');

// Route untuk halaman profile
Route::get('/profile/sign_in', function () {
    return view('profile.sign');
})->name('profile.sign_in');

// Route autentikasi
Auth::routes();

// Route untuk pengguna
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/daftar', [HomeController::class, 'sign_in'])->name('daftar');

// Route untuk login dan register dengan kustom controller
// Route::post('/login/credentials', [CustomLoginController::class, 'credentials'])->name('login.credentials');
// Route::post('/register/credentials', [CustomUserRegisterController::class, 'credentials'])->name('register.credentials');

// Route untuk halaman sign-in dan sign-up
Route::get('/profiles/sign_in', [CustomLoginController::class, 'create'])->name('profiles.sign_in');
Route::post('/profiles/sign_in', [CustomLoginController::class, 'store'])->name('login.credentials');

Route::get('/profiles/sign_up', [CustomUserRegisterController::class, 'create'])->name('profiles.sign_up');
Route::post('/profiles/sign_up', [CustomUserRegisterController::class, 'store'])->name('register.credentials');



// Route admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Route manager
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
