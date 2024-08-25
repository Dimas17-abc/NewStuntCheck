<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autentikasi user setelah pendaftaran
        Auth::login($user);

        // Redirect ke halaman profil setelah berhasil mendaftar dan login
        return redirect()->route('profiles.sign_in');
    }
}
=======
use Auth;

class CustomRegisterController extends Controller
{
    public function credentials(Request $request)
    {
    $tekan = $request->validate([
        'email' => 'required',
        'password' => 'required',
        'password_confirmation' => 'required',
    ]);
    if (Auth::attempt($tekan)) {
        return redirect()->route('profiles.sign_in');
    } else {
        return redirect()->back();
    }
}
}
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
