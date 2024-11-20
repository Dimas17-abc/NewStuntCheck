<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Pastikan Anda menggunakan facade HTTP untuk melakukan request

class trackLocationController extends Controller
{
    // Fungsi untuk mendapatkan lokasi berdasarkan IP
    public function trackLocation()
    {
        // Mendapatkan IP Pengguna
        $ip = request()->ip(); 

        // Untuk testing pada localhost
        if ($ip == '127.0.0.1') {
            $ip = '8.8.8.8'; // Menggunakan IP eksternal untuk testing
        }

        // Mengirimkan permintaan HTTP ke API ipinfo.io
        $response = Http::get("https://ipinfo.io/{$ip}/json?token=97db6a1cef6e7d");

        // Mengecek apakah permintaan berhasil
        if ($response->successful()) {
            $data = $response->json(); // Mendapatkan data sebagai array

            return response()->json([
                'ip' => $data['ip'],
                'country' => $data['country'],
                'region' => $data['region'],
                'city' => $data['city'],
                'location' => $data['loc'], // Latitude dan Longitude
            ]);
        } else {
            return response()->json(['error' => 'Unable to fetch location'], 500);
        }
    }

    // Fungsi untuk menampilkan lokasi di view
    public function showLocation()
    {
        $location = $this->trackLocation(); // Panggil fungsi untuk mendapatkan lokasi
        return view('location', compact('location')); // Kirim data lokasi ke view
    }
}
