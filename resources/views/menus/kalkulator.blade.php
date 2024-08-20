<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Pertumbuhan</title>
    <link rel="stylesheet" href="{{ asset('css/kalku.css') }}">
</head>
<body>
    <div class="container">
        <a href="{{ route('menus.home') }}" class="back-icon">
            <img src="{{ asset('image/back.png') }}" alt="Back" style="width: 24px;">
        </a>
        <h1>Kalkulator Pertumbuhan</h1>
        <h2>Hola! Ayo cek pertumbuhan dan perkembangan balita kamu dengan menggunakan Kalkulator Pertumbuhan Balita</h2>
        <form action="{{ route('kalkulator.hitung') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama" required>
            </div>
            <div class="input-group">
                <label for="age">Umur</label>
                <input type="number" id="age" name="age" placeholder="Masukkan umur (bulan)" min="0" max="59" required>
            </div>
            <div class="input-group">
                <label for="height">Tinggi</label>
                <input type="number" id="height" name="height" placeholder="Masukkan tinggi (cm)" required>
            </div>
            <div class="input-group">
                <label for="weight">Berat</label>
                <input type="number" id="weight" name="weight" placeholder="Masukkan berat (kg)" required>
            </div>
            <div class="input-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" required>
                    <option value="male">Laki-Laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn">Hitung Pertumbuhan</button>

            <div class="result">
                @if(isset($name))
                <h3>Hasil Perhitungan</h3>
                <p>Nama: {{ $name }}</p>
                <p>Umur: {{ $age }} bulan</p>
                <p>Tinggi: {{ $height }} cm</p>
                <p>Berat: {{ $weight }} kg</p>
                <p>Kategori: {{ $category }}</p>
                @endif
            </div>
            
        </form>
    </div>
</body>
</html>
