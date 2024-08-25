<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Pertumbuhan</title>
    <link rel="stylesheet" href="{{ asset('css/kalku.css') }}">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <div class="container">
        <a href="{{ route('menus.home') }}" class="back-icon">
            <img src="{{ asset('images/back.png') }}" alt="Back" style="width: 24px;">
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
                <input type="number" id="weight" name="weight" placeholder="Masukkan berat (kg)" type="boolean">
            </div>
            <div class="input-group">
                <label for="gender">Jenis Kelamin</label>
                <select id="gender" name="gender" required>
=======
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
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
                    <option value="male">Laki-Laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>
<<<<<<< HEAD
            <button type="submit" class="btn btn-success">Hitung Pertumbuhan</button>

            <div class="result">
                @if(isset($name))
                <h3>Hasil Perhitungan</h3>
                <p>Nama: {{ $name }}</p>
                <p>Umur: {{ $age }} bulan</p>
                <p>Tinggi: {{ $height }} cm</p>
                <p>Berat: {{ $weight }} kg</p>
                <p>Kategorii: {{ $category }}</p>
                @endif
            </div>

            @if(isset($title))
                <h1>{{ $title }}</h1>
            @endif

            @if(isset($users) && count($users) > 0)
            <table class="table table-bordered" id="canvas">
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Tinggi</th>
                    <th>Berat</th>
                    <th>Kategori</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->height }}</td>
                    <td>{{ $user->weight }}</td>
                    <td>{{ $user->category }}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </form>
        <form action="{{ route('kalkulator.export-pdf') }}" method="GET" style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Download PDF</button>
        </form>
    </div>

    <script>

    </script>

    <div>
        
=======
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
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
    </div>
</body>
</html>
