<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan import facade PDF
use Illuminate\Http\Request;


class PDFAdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // Pastikan user sudah terautentikasi
    //     $this->middleware(CheckAdmin::class); // Middleware untuk memastikan user adalah admin
    // }

    // public function downloadPdf()
    // {
    //     $users = User::all();
    //     $pdf = Pdf::loadView('pdf.users', compact('users'));

    //     return $pdf->download('users.pdf');
    // }

    public function downloadPdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users_pdf', compact('users'));
        return $pdf->download('users.pdf');
    }
}
