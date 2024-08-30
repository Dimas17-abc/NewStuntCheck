<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function exportPDF(Request $request)
    {
        // Ambil data pengguna yang terautentikasi atau semua pengguna berdasarkan permintaan
        if ($request->has('user_id')) {
            $user = User::find($request->input('user_id'));
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }
        } else {
            $user = Auth::user();
        }

        // Buat PDF menggunakan tampilan 'pdf.kalkulator' dan data $user
        $pdf = Pdf::loadView('pdf.kalkulator', compact('user'));

        // Download PDF dengan nama file yang spesifik
        return $pdf->download('kalkulator-pertumbuhan-' . $user->name . '.pdf');
    }
}
