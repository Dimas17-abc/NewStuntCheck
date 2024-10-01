<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    // Validasi input email dan password
    public function credentials(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }

    // Fungsi login
    public function login(Request $request)
    {
        // Ambil kredensial yang divalidasi
        $credentials = $this->credentials($request);

        // Coba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Simpan pesan sukses login ke session
            session()->flash('success', 'Login berhasil!');

            // Periksa tipe user dan arahkan ke route yang sesuai
            if ($user->type === 1) { // 1 untuk admin
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('menus.home');
            }
        } else {
            // Jika login gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withErrors('Login gagal, email atau password salah.');
        }
    }
}
