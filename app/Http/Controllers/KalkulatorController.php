<?php

namespace App\Http\Controllers;

use App\Models\Kalku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class KalkulatorController extends Controller
{  public function calculate(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $gender = $request->input('gender');
        $user = auth()->user();


        // Klasifikasi stunting berdasarkan umur, tinggi, dan berat
        $stunting = false;

        if ($gender == 'male') {
            if (($age <= 6 && $height < 60 && $weight < 5.5) ||
                ($age > 6 && $age <= 12 && $height < 70 && $weight < 7.5) ||
                ($age > 12 && $age <= 24 && $height < 80 && $weight < 9.5) ||
                ($age > 24 && $age <= 36 && $height < 85 && $weight < 11.5) ||
                ($age > 36 && $age <= 48 && $height < 95 && $weight < 13.5) ||
                ($age > 48 && $age <= 60 && $height < 100 && $weight < 15)
            ) { 
                $stunting = true;
            }
        } else {
            if (($age <= 6 && $height < 58 && $weight < 5) ||
                ($age > 6 && $age <= 12 && $height < 68 && $weight < 7) ||
                ($age > 12 && $age <= 24 && $height < 78 && $weight < 9) ||
                ($age > 24 && $age <= 36 && $height < 83 && $weight < 11) ||
                ($age > 36 && $age <= 48 && $height < 93 && $weight < 13) ||
                ($age > 48 && $age <= 60 && $height < 98 && $weight < 14.5)
            ) {
                $stunting = true;
            }
        }

        $category = $stunting ? 'Anak berpotensi mengalami stunting' : 'Anak tumbuh normal';

        $kalku = Kalku::create([
            'name' => $name,
            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'category' => $category,
            'user_id' => $user->id,  // Simpan user_id ke database
        ]);


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
