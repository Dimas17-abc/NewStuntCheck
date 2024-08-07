<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuntCheck</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container">
        <h1>Hello Echa</h1>
        <h2>Selamat Datang di StuntCheck!</h2>

        <!-- Artikel Stunting -->
        <div class="content-box">
            <h3>Berita Terkini Tentang Stunting di Indonesia</h3>
            <p>Stunting masih menjadi masalah utama di Indonesia. Menurut data terbaru, lebih dari 27% anak di Indonesia mengalami stunting, yang dapat mempengaruhi perkembangan fisik dan kognitif mereka. Pemerintah terus berupaya menurunkan angka ini dengan berbagai program kesehatan dan nutrisi.</p>
            <p><strong>Sumber:</strong> Kementerian Kesehatan RI</p>
        </div>

        <!-- Data Tahunan Stunting -->
        <div class="content-box">
            <h3>Data Tahunan Stunting (2019-2023)</h3>
            <canvas id="stuntingChart"></canvas>
        </div>

        <!-- Artikel Nutrisi -->
        <div class="content-box">
            <h3>Pentingnya Nutrisi Seimbang untuk Anak</h3>
            <p>Nutrisi yang tepat sangat penting bagi tumbuh kembang anak. Asupan gizi yang seimbang dapat mencegah stunting dan memastikan anak tumbuh dengan sehat. Pastikan anak mendapatkan cukup protein, vitamin, dan mineral setiap hari.</p>
            <p><strong>Sumber:</strong> WHO, UNICEF</p>
        </div>

        <!-- Kalkulator Pertumbuhan -->
        <div class="content-box">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('stuntingChart').getContext('2d');
        const stuntingChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023'],
                datasets: [{
                    label: 'Prevalensi Stunting (%)',
                    data: [30, 29, 28, 27.5, 27],
                    backgroundColor: 'rgba(39, 174, 96, 0.7)', /* Hijau transparan */
                    borderColor: 'rgba(39, 174, 96, 1)',
                   

                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
