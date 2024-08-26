<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * Show the registration page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegis(): View
    {
        return view('regis');
    }

    /**
     * Show the admin home page.
     *
     * @return \Illuminate\View\View
     */
    public function adminHome(): View
    {
        return view('adminHome');
    }

    /**
     * Show the manager home page.
     *
     * @return \Illuminate\View\View
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }

    /**
     * Show the user profile settings page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('profiles.setting', compact('user'));
    }
}
