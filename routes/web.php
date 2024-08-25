<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< HEAD
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController; 
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;

// Route utama
=======

>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
// Profil Routes
=======
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
Route::get('/profiles/sign_in', function () {
    return view('profiles.sign_in');
})->name('profiles.sign_in');

Route::get('/profiles/sign_up', function () {
    return view('profiles.sign_up');
})->name('profiles.sign_up');

<<<<<<< HEAD
Route::middleware('auth')->group(function () {
    Route::get('/menus/home', function () {
        return view('menus.home');
    })->name('menus.home');

    Route::get('/menus/kalkulator', function () {
        return view('menus.kalkulator');
    })->name('menus.kalkulator');

    Route::get('/profiles/setting', function () {
        return view('profiles.setting');
    })->name('profiles.setting');

    // Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.setting');
    // Route::middleware('auth')->group(function () {
    //     // Profile Update Routes
    //     Route::post('/profile/update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
    //     Route::put('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.update.name');
    //     Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
    //     Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    // });
    

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.setting');
Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');
Route::put('/profile/name', [ProfileController::class, 'updateName'])->name('profile.update.name');
Route::put('/profile/email', [ProfileController::class, 'updateEmail'])->name('profile.update.email');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


    // Kalkulator Routes
    Route::post('/menus/kalkulator/hitung', [KalkulatorController::class, 'calculate'])->name('kalkulator.hitung');
    Route::get('/menus/kalkulator/results', [KalkulatorController::class, 'showResults'])->name('kalkulator.results');
    Route::get('/kalkulator/export-pdf', [KalkulatorController::class, 'exportPDF'])->name('kalkulator.export-pdf');

});

// News Routes
Route::middleware('admin')->group(function () {
    Route::get('/news/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update', [NewsController::class, 'update'])->name('news.update');
});

// Authentication Routes
Auth::routes();

// User Routes
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/regis', [HomeController::class, 'index'])->name('regis');
});

// Admin Routes
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Manager Routes
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Custom Authentication Routes
Route::post('/login/credentials', [App\Http\Controllers\CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/register', [App\Http\Controllers\CustomRegisterController::class, 'register'])->name('register');
=======
Route::get('/menus/home', function () {
    return view('menus.home');
})->name('menus.home');

Route::get('/menus/kalkulator', function () {
    return view('menus.kalkulator');
})->name('menus.kalkulator');

Route::get('/profile/sign_in', function () {
    return view('profile.sign');
})->name('profile.sign_in');


Auth::routes();
//user
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/daftar', [HomeController::class, 'index'])->name('daftar');
// // Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
//admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
//all admin manager
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login/credentials', [App\Http\Controllers\CustomLoginController::class, 'credentials'])->name('credentials');
Route::post('/daftar/credentials', [App\Http\Controllers\CustomRegisterController::class, 'credentials'])->name('credentials');
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
