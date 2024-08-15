<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
