<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

=======
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuntCheck</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
<<<<<<< HEAD

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
                    <img src="{{ asset('images/human.png') }}" alt="" width="65px">
                </a>
            </div>
        </div>
        <!-- Artikel Stunting -->
        <div class="content-box">
            <h3>Berita Terkini Tentang Stunting di Indonesia</h3>
            <p id="news-content">Stunting masih menjadi masalah utama di Indonesia. Menurut data terbaru, lebih dari 27%
                anak di Indonesia
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
            <h1 style="text-align: center">
                Rekomendasi Makanan
            </h1>
            <h2 class="rekomen">
                1. Tempe dan Tahu
                <p>
                    Tempe dan tahu adalah sumber protein nabati yang berbahan dasar dari kedelai. Setiap 100 gramnya,
                    tempe mengandung protein sebanyak 14 gram, sedangkan tahu sebesar 10,9 gram protein.

                    Selain itu, kedua makanan ini juga mengandung zat besi yang memiliki berbagai manfaat untuk tubuh
                    anak. Mulai dari meningkatkan energi tubuh, meningkatkan sistem imun, dan menjaga kesehatan tulang.

                    Dalam semangkuk atau setara 85 gram tempe, dapat mencukupi kebutuhan zat besi harian sebanyak 10
                    persen. Sementara itu, dengan porsi yang sama tahu dapat memenuhi 8 persen kebutuhan zat besi
                    harian.

                    Selain itu, ibu juga bisa menghubungi dokter anak di Halodoc mengenai jenis makanan yang baik untuk
                    cegah stunting.
                </p>
                2. Kacang Kacangan
                <p>
                    Anak-anak biasanya kurang menyukai kacang-kacangan. Padahal, kacang-kacangan adalah makanan
                    alternatif yang baik untuk memenuhi kebutuhan protein pada balita. Kacang hijau contohnya, satu
                    porsi atau setara 100 gram mengandung 8,7 gram protein.

                    Kacang hijau juga biasanya diberikan sebagai Pemberian Makanan Tambahan (PMT) pada balita di
                    posyandu. Selain kacang hijau, kacang tanah pun yang juga kaya nutrisi.
                </p>
                3. Telur
                <p>
                    Untuk mencegah stunting tidak hanya anak yang perlu makanan bergizi, ibu pun juga harus mengonsumsi
                    makanan bergizi.

                    Bumil dan busui dapat menambahkan sebutir telur sebagai sumber protein pada menu harian.

                    Telur mengandung asam amino yang baik untuk tubuh ibu dan bayi.

                    Telur juga mengandung selusin vitamin dan mineral termasuk kolin yang bagus untuk perkembangan otak
                    bayi. Ingat, ibu harus mengonsumsi telur dalam keadaan matang untuk mencegah kontaminasi bakteri.
                </p>
                4. Hati Ayam
                <p>
                    Hati ayam ternyata mengandung protein yang lebih tinggi dari daging ayam. Dalam 100 gram hati ayam
                    mentah mengandung 27,4 protein, sedangkan daging ayam hanya 18,2 gram protein.

                    Tidak hanya tinggi protein, hati ayam juga cenderung rendah kalori sehingga asupan hati ayam akan
                    membuat kenyang lebih cepat dan bertahan lebih lama.

                    Hati ayam juga kaya vitamin B yang sangat baik untuk bumil dan anak-anak dalam masa pertumbuhan.
                    Pada setiap 100 gram hati ayam mengandung 16,6 mcg vitamin B12, 0,9 mg vitamin B6, dan 0,36 mg
                    vitamin B1.
                </p>
                5. Ikan
                <p>
                    Ikan kembung adalah salah satu makanan yang baik untuk mencegah stunting pada anak. Meski harganya
                    lebih murah daripada ikan lainnya, ikan kembung memiliki nilai gizi yang hampir sama dengan ikan
                    salmon.

                    Ikan kembung kaya akan sumber vitamin B2, B3, B6, B12, dan vitamin D. Ikan kembung bermanfaat untuk
                    meningkatkan kesehatan jantung, mencegah penyakit otak, dan menguatkan tulang.

                    Itulah beberapa jenis makanan bergizi dengan harga terjangkau yang dapat mencegah stunting pada
                    balita.
                </p>
                6. Buah
                <p>
                    Kementerian Kesehatan (Kemenkes) RI menyarankan untuk memasukkan buah sebagai salah satu menu
                    bergizi untuk mencegah stunting.

                    Buah tidak perlu mahal, bisa pisang ambon ukuran sedang, ataupun jeruk manis berukuran kurang lebih
                    100 gram.
                </p>
                7. Sayuran
                <p>
                    Sayuran juga merupakan komponen penting untuk mencegah stunting pada anak. Kemenkes RI
                    merekomendasikan sayur bayam ataupun kacang panjang ke dalam menu harian.

                    Bayam dapat melancarkan sistem pencernaan dan menyehatkan tulang dan gigi. Sedangkan kacang panjang
                    berkhasiat sebagai sumber protein, menyeimbangkan gula darah, dan menurunkan risiko obesitas.

                    Stunting bisa sangat berdampak pada kualitas hidup anak. Jika ingin berkonsultasi mengenai kesehatan
                    Si Kecil.
                </p>
            </h2>
            <p><strong>Sumber:</strong><a href="https://www.halodoc.com/artikel/7-makanan-bergizi-untuk-mencegah-stunting-pada-balita"> Halodoc</p></a>
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
                    backgroundColor: 'rgba(39, 174, 96, 0.7)',
                    /* Hijau transparan */
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

=======
</head>
<body>
    <div class="container">
        <h1>Hello Echa</h1>
        <h2>Selamat Datang di StuntCheck!</h2>
        <div class="grid">
            <div class="card">
                <i class="icon">📄</i>
                <p>Artikel</p>
            </div>
            <div class="card">
                <i class="icon">📊</i>
                <p>Data Tahunan</p>
            </div>
            <div class="card">
                <i class="icon">🥕🍎</i>
                <p>Nutrisi</p>
            </div>
            <div class="card">
                <i class="icon">🧮</i>
                <p>Kalkulator</p>
            </div>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="#" class="nav-link active"><span class="nav-icon">➕</span> Health</a>
        <a href="#" class="nav-link"><span class="nav-icon">🏠</span> Home</a>
        <a href="#" class="nav-link"><span class="nav-icon">👤</span> Profile</a>
    </div>
</body>
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
</html>
