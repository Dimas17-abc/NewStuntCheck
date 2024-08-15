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
        <h1>Kalkulator Pertumbuhan</h1>
        <h2>Hola! Ayo cek pertumbuhan dan perkembangan balita kamu dengan menggunakan Kalkulator Pertumbuhan Balita</h2>
        <form>
            <div class="input-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama">
            </div>
            <div class="input-group">
                <label for="age">Umur</label>
                <input type="number" id="age" name="age" placeholder="Masukkan umur (bulan)" min="0" max="59">
            </div>
            <div class="input-group">
                <label for="height">Tinggi</label>
                <input type="number" id="height" name="height" placeholder="Masukkan tinggi (cm)">
            </div>
            <div class="input-group">
                <label for="weight">Berat</label>
                <input type="number" id="weight" name="weight" placeholder="Masukkan berat (kg)">
            </div>
            <div class="input-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender">
                    <option value="male">Laki-Laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn">Hitung Pertumbuhan</button>
        </form>
        <div class="result">
            <h3>Hasil Perhitungan</h3>
            <p>Nama: </p>
            <p>Umur:    bulan</p>
            <p>Tinggi:  cm</p>
            <p>Berat:   kg</p>
            <p>Kategori:    </p>
            <button class="btn">Simpan Hasil Ukur</button>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="#" class="nav-link active"><span class="nav-icon">➕</span> Health</a>
        <a href="#" class="nav-link"><span class="nav-icon">🏠</span> Home</a>
        <a href="#" class="nav-link"><span class="nav-icon">👤</span> Profile</a>
    </div>
</body>
</html>
