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
        <div class="profile-container">
            <div class="profile-text">
                <h1>Hello {{ Auth::user()->name }}</h1>
                <h2>Selamat Datang di StuntCheck!</h2>
            </div>
            <div class="profile-settings">
                <a href="{{ route('profiles.setting') }}">
                    <img src="{{asset('images/human.png')}}" alt="" width="65px">
                </a>
            </div>
        </div>
        <!-- Artikel Stunting -->
        <div class="content-box">
            <h3>Berita Terkini Tentang Stunting di Indonesia</h3>
            <p id="news-content">Stunting masih menjadi masalah utama di Indonesia. Menurut data terbaru, lebih dari 27% anak di Indonesia
                mengalami stunting, yang dapat mempengaruhi perkembangan fisik dan kognitif mereka. Pemerintah terus
                berupaya menurunkan angka ini dengan berbagai program kesehatan dan nutrisi.</p>
            <p><strong>Sumber:</strong> Kementerian Kesehatan RI</p>
            
            <!-- Tombol Update Berita -->
            @can('update-news')
                <button id="update-news-btn">Update Berita</button>
            @endcan
        </div>

        <!-- Data Tahunan Stunting -->
        <div class="content-box">
            <h3>Data Tahunan Stunting (2019-2023)</h3>
            <canvas id="stuntingChart"></canvas>
        </div>

        <!-- Artikel Nutrisi -->
        <div class="content-box">
            <h3>Pentingnya Nutrisi Seimbang untuk Anak</h3>
            <p>Nutrisi yang tepat sangat penting bagi tumbuh kembang anak. Asupan gizi yang seimbang dapat mencegah
                stunting dan memastikan anak tumbuh dengan sehat. Pastikan anak mendapatkan cukup protein, vitamin, dan
                mineral setiap hari.</p>
            <p><strong>Sumber:</strong> WHO, UNICEF</p>
        </div>

        <!-- Kalkulator Pertumbuhan -->
        @include('menus.kalkulator')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js configuration
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

        // Event listener for update button
        document.getElementById('update-news-btn')?.addEventListener('click', function() {
            // Logic to handle news update, e.g., showing a form or redirecting to an update page
            alert('Update berita!');
        });
    </script>
</body>

</html>
