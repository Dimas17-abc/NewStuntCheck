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
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'nik' => 'required|string|digits:16',
        //     'age' => 'required|numeric|min:0|max:150',
        //     'height' => 'required|numeric|min:0|max:300',
        //     'weight' => 'required|numeric|min:0|max:500',
        //     'gender' => 'required|in:male,female',
        // ]);

        $name = $request->input('name');
        $address = $request->input('address');
        $nik = $request->input('nik');
        $age = $request->input('age');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $gender = $request->input('gender');
        // $economicStatus = $request->input('economicStatus'); 
        $user = Auth::user();

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
            'address' => $address,
            'nik' => $nik,
            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'category' => $category,
            'user_id' => $user->id,  // Simpan user_id ke database
        ]);
        
        // Ambil semua data kalkulator milik user saat ini
        $users = Kalku::where('user_id', $user->id)->get();
        
        // return view('menus.kalkulator', [
        //     'name' => $request->name,
        //     'address' => $request->address,
        //     'nik' => $request->nik,
        //     'age' => $request->age,
        //     'height' => $request->height,
        //     'weight' => $request->weight,
        //     'category' => $category,
        // ]);


        return view('menus.kalkulator', compact('name', 'address', 'nik', 'age', 'height', 'weight', 'category', 'users'));
    }

    public function exportPDF()
    {
        $user = auth()->user();
        $kalkus = Kalku::where('user_id', $user->id)->get();

        $pdf = PDF::loadView('pdf.kalkulator', ['kalkus' => $kalkus]);
        return $pdf->download('hasil_kalkulator_pertumbuhan.pdf');
    }
}
