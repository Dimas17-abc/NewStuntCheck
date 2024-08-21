<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController; 
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

Route::get('/menus/home', function () {
    return view('menus.home');
})->middleware('auth')->name('menus.home');

Route::get('/menus/kalkulator', function () {
    return view('menus.kalkulator');
})->middleware('auth')->name('menus.kalkulator');

Route::get('/profiles/setting', function () {
    return view('profiles.setting');
})->middleware('auth')->name('profiles.setting');

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profiles.setting');


// Route untuk memperbarui foto profil
Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');

Route::post('/menus/kalkulator/hitung', [KalkulatorController::class, 'calculate'])->name('kalkulator.hitung');


Route::get('/kalkulator/export-pdf', [PDFController::class, 'exportPDF'])->name('kalkulator.exportPDF');

Route::get('/update-news', [NewsController::class, 'edit'])->name('news.edit')->middleware('can:update-news');
Route::post('/update-news', [NewsController::class, 'update'])->middleware('can:update-news');

Auth::routes();

// User routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/regis', [HomeController::class, 'index'])->name('regis');
});

// Admin routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Manager routes
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Custom authentication routes
Route::post('/login/credentials', [App\Http\Controllers\CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/register', [App\Http\Controllers\CustomRegisterController::class, 'register'])->name('register');
