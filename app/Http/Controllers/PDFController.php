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
          // Ambil data pengguna, misalnya semua pengguna atau pengguna yang terautentikasi
          $users = User::get($request); // Ambil semua pengguna
          // Atau jika Anda ingin hanya mengambil pengguna yang terautentikasi
          // $users = Auth::user();
  
          // Buat PDF menggunakan tampilan 'pdf.kalkulator' dan data $users
          $pdf = Pdf::loadView('menus.kalkulator', compact('users'));
          return $pdf->download('kalkulator-pertumbuhan.pdf');
      }
  }
  