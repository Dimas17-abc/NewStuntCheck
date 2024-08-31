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
                    <img src="{{ Auth::user()->profile_photo ? asset('storage/profile_photos/' . Auth::user()->profile_photo) : asset('images/human.png') }}"
                        alt="Profile Picture">
                </a>
            </div>
        </div>

        <!-- Tombol Tambah Berita, Tambah Rekomendasi Makanan, dan Download Data User Khusus untuk Admin -->
        @if (Auth::user()->isAdmin())
            <div class="admin-actions">
                <a href="{{ route('news.create') }}" class="btn btn-success float-right">Tambah Berita</a>
            </div>
        @endif

        <!-- Artikel Stunting -->
        <div class="content-box">
            <h3>Berita Terkini Tentang Stunting di Indonesia</h3>
            <div class="container">
                <h1>Berita Terbaru</h1>
                @foreach ($news as $newsItem)
                    <div class="news-item">
                        <h2>{{ $newsItem->title }}</h2>
                        <p>{{ $newsItem->description }}</p>
                        @if ($newsItem->source)
                            <p><a href="{{ $newsItem->source }}" target="_blank">{{ $newsItem->source }}</a></p>
                        @endif
                        @if ($newsItem->image)
                            <!-- Cek apakah gambar ada -->
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Gambar"
                                style="max-width: 100%; height: auto;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>





        <!-- Data Tahunan Stunting -->
        <div class="content-box">
            <h3>Data Tahunan Stunting (2019-2023)</h3>
            <canvas id="stuntingChart"></canvas>
        </div>

        <!-- Artikel Nutrisi -->
        <div class="content-box">
            <section>
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('food-recommendations.create') }}" class="btn btn-success float-right">
                        Tambah Rekomendasi Makanan
                    </a>
                @endif
            </section>
            <h1 style="text-align: center">Rekomendasi Makanan</h1>
            <div class="container">
                @foreach ($foodRecommendations as $foodRecommendation)
                    <div class="food-item">
                        <h2>{{ $foodRecommendation->title }}</h2>
                        <p>{{ $foodRecommendation->description }}</p>
                        @if ($foodRecommendation->image)
                            <!-- Cek apakah gambar ada -->
                            <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="Gambar"
                                style="max-width: 100%; height: auto;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif

                    </div>
                @endforeach

            </div>

            <!-- Kalkulator Pertumbuhan -->
            @include('menus.kalkulator')
            <div>
                <div>
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('admin.download-users-pdf') }}" class="btn btn-primary float-right mr-2">
                            Download data user (PDF)
                        </a>
                    @endif
                </div>


            </div>
        </div>


</body>

</html>
