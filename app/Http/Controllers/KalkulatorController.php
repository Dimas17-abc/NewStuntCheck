<?php

namespace App\Http\Controllers;

use App\Models\Kalku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class KalkulatorController extends Controller
{
    public function calculate(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $gender = $request->input('gender');
        // $economicStatus = $request->input('economicStatus');
        $user =Auth::user();

        // Klasifikasi umur
        if ($age < 12) {
            $ageCategory = 'Bayi';
        } else {
            $ageCategory = 'Anak';
        }

        // Klasifikasi berat badan
        if ($weight < 2.5) {
            $weightCategory = 'Rendah';
        } elseif ($weight >= 2.5 && $weight <= 4) {
            $weightCategory = 'Normal';
        } else {
            $weightCategory = 'Lebih';
        }

        // Klasifikasi tinggi badan
        if ($height < 85) {
            $heightCategory = 'Pendek';
        } elseif ($height >= 85 && $height <= 110) {
            $heightCategory = 'Normal';
        } else {
            $heightCategory = 'Tinggi';
        }

        // Diagnosa Stunting
        $stunting = false;
        if ($heightCategory == 'Pendek' || $weightCategory == 'Rendah') {
            $stunting = true;
        }

        $category = $stunting ? 'Anak berpotensi mengalami stunting' : 'Anak tumbuh normal';

        // Simpan ke dalam database
        $kalku = Kalku::create([
            'name' => $name,
            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender, 
            'category' => $category,
            'user_id' => $user->id,  // Simpan user_id ke database
        ]);

        // Ambil semua data kalkulator milik user saat ini
        $users = Kalku::where('user_id', $user->id)->get();

        return view('menus.kalkulator', compact('name', 'age', 'height', 'weight', 'category', 'users'));
    }

    public function exportPDF()
    {
        $user = auth()->user();
        $kalkus = Kalku::where('user_id', $user->id)->get();

        $pdf = PDF::loadView('pdf.kalkulator', ['kalkus' => $kalkus]);
        return $pdf->download('hasil_kalkulator_pertumbuhan.pdf');
    }
}
