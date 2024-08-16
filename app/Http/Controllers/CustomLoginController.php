<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{

    public function credentials(Request $request)
    {
        $token = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($token)) {
            return redirect()->route('menus.home');
        } else {
            return redirect()->back();
        }

    }

}
