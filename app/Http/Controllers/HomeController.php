<?php
<<<<<<< HEAD
=======

>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82

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
<<<<<<< HEAD
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
=======
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
    {
        return view('home');
    }

    /**
<<<<<<< HEAD
     * Show the registration page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showRegis()
    {
        return view('regis');
    }

    /**
     * Show the admin home page.
     *
     * @return \Illuminate\View\View
     */
=======
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
    public function adminHome(): View
    {
        return view('adminHome');
    }

    /**
<<<<<<< HEAD
     * Show the manager home page.
     *
     * @return \Illuminate\View\View
=======
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
<<<<<<< HEAD

    /**
     * Show the user profile settings page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProfile()
    {
        $user = Auth::user();
        return view('profiles.setting', compact('user'));
    }
=======
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
}
