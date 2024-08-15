<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
