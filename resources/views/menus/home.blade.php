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
        <!-- Bagian Profil -->
        <div class="profile-container">
            <div class="profile-text">
                <h1>Hello, {{ Auth::user()->name }}</h1>
                <h2>Selamat Datang di StuntCheck!</h2>
            </div>
            <div class="profile-settings">
                <a href="{{ route('profiles.setting') }}">
                    <img src="{{ Auth::user()->profile_photo ? asset('storage/profile_photos/' . Auth::user()->profile_photo) : asset('images/human.png') }}"
                        alt="Profile Picture" class="profile-image">
                </a>
            </div>
        </div>

        <!-- Kalkulator Pertumbuhan Anak -->
        <div class="content-box kalkulator-container">
            @include('menus.kalkulator')
        </div>

        <!-- Berita Stunting -->
        <div class="content-box">
            <h3>Berita Tentang Stunting di Indonesia</h3>
            <h1>Berita Terbaru</h1>
            <div class="news-container">
                @foreach ($news as $newsItem)
                    <div class="news-item">
                        <h2>{{ $newsItem->title }}</h2>
                        <p>{{ $newsItem->description }}</p>
                        @if ($newsItem->source)
                            <p><strong>Sumber:</strong> <a href="{{ $newsItem->source }}" target="_blank">{{ $newsItem->source }}</a></p>
                        @endif
                        @if ($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Gambar Berita" class="news-image">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Rekomendasi Makanan -->
        <div class="content-box">
            <h1 style="text-align: center">Rekomendasi Makanan</h1>
            <div class="food-container">
                @foreach ($foodRecommendations as $foodRecommendation)
                    <div class="food-item">
                        <h2>{{ $foodRecommendation->title }}</h2>
                        <p>{{ $foodRecommendation->description }}</p>
                        @if ($foodRecommendation->source)
                            <p><strong>Sumber:</strong> <a href="{{ $foodRecommendation->source }}" target="_blank">{{ $foodRecommendation->source }}</a></p>
                        @endif
                        @if ($foodRecommendation->image)
                            <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="Gambar Makanan" class="food-image">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
