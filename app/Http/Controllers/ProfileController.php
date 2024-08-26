<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    // Menampilkan halaman profil
    public function showProfile()
    {
        return view('profiles.setting', ['user' => Auth::user()]);
    }

    // Mengupdate foto profil pengguna
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = Auth::user();
        if ($user->profile_photo) {
            Storage::delete('public/profile_photos/' . $user->profile_photo);
        }
    
        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->storeAs('public/profile_photos', $photoName);
    
        $user->profile_photo = $photoName;
        $user->save();
    
        // Debugging
        // dd('Photo uploaded successfully', $photoName);
    
        return redirect()->route('profiles.setting')->with('success', 'Foto profil berhasil diperbarui.');
    }

    // Mengupdate nama pengguna
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->route('profiles.setting')->with('success', 'Nama berhasil diperbarui.');
    }

    // Mengupdate email pengguna
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profiles.setting')->with('success', 'Email berhasil diperbarui.');
    }

    // Mengupdate password pengguna
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profiles.setting')->with('success', 'Password berhasil diperbarui.');
    }
}
