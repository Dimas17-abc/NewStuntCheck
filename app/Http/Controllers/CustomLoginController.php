<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

// class CustomLoginController extends Controller
// {

//     public function credentials(Request $request)
//     {
//         $token = $request->validate([
//             'email' => 'required',
//             'password' => 'required'
//         ]);
//         if (Auth::attempt($token)) {
//             return redirect()->route('menus.home');
//         } else {
//             return redirect()->back();
//         }

//     }

// }
class CustomLoginController extends Controller
{
    public function create()
    {
        return view('profiles.sign_in');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('menus.home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}