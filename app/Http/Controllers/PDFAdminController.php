<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PDFAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user-access:admin');
    }

    public function downloadUsersPDF()
    {
        $users = User::all();
        $pdf = Pdf::loadView('pdf.users', compact('users'));

        return $pdf->download('users.pdf');
    }
}
