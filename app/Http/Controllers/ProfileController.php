<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('profiles.setting', compact('user'));
    }

    public function updatePhoto(Request $request)
    {
        $user = Auth::user();

        // Validasi file gambar
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Hapus gambar lama jika ada
        if ($user->profile_photo) {
            Storage::delete('public/profile_photos/' . $user->profile_photo);
        }

        // Simpan gambar baru dengan nama unik
        $fileName = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->storeAs('public/profile_photos', $fileName);

        // Update path foto di database
        $user->profile_photo = $fileName;
        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
