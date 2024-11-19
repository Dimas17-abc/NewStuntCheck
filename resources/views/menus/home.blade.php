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
        <section class="content-box">
            <h3>Berita Tentang Stunting di Indonesia</h3>
            <h1>Berita Terbaru</h1>
            <div class="carousel">
                <button class="carousel-btn prev-btn">❮</button>
                <div class="news-container">
                    @foreach ($news as $newsItem)
                        <div class="news-item">
                            <h2>{{ $newsItem->title }}</h2>
                            <p>{{ $newsItem->description }}</p>
                            @if ($newsItem->image)
                                <div class="image-container">
                                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}">
                                    <small class="image-source">Sumber:
                                        {{ $newsItem->source ?? 'Tidak ada sumber' }}</small>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="carousel-btn next-btn">❯</button>
            </div>
        </section>

        <!-- Rekomendasi Makanan -->
        <div class="content-box">
            <h1 style="text-align: center">Rekomendasi Makanan</h1>
            <div class="food-container">
                @foreach ($foodRecommendations as $foodRecommendation)
                    <div class="food-item">
                        <h2>{{ $foodRecommendation->title }}</h2>
                        <p>{{ $foodRecommendation->description }}</p>
                        @if ($foodRecommendation->image)
                            <div class="image-container">
                                <img src="{{ asset('storage/' . $foodRecommendation->image) }}"
                                    alt="{{ $foodRecommendation->title }}">
                                <small class="image-source">Sumber:
                                    {{ $foodRecommendation->source ?? 'Tidak ada sumber' }}</small>
                            </div>
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const newsContainer = document.querySelector('.news-container');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const itemWidth = 320; // Lebar setiap berita termasuk margin (sesuaikan dengan CSS)
            let currentScroll = 0;

            prevBtn.addEventListener('click', () => {
                currentScroll -= itemWidth;
                if (currentScroll < 0) {
                    currentScroll = 0; // Jangan geser lebih jauh ke kiri
                }
                newsContainer.style.transform = `translateX(-${currentScroll}px)`;
            });

            nextBtn.addEventListener('click', () => {
                currentScroll += itemWidth;
                const maxScroll = newsContainer.scrollWidth - newsContainer.offsetWidth;
                if (currentScroll > maxScroll) {
                    currentScroll = maxScroll; // Jangan geser lebih jauh ke kanan
                }
                newsContainer.style.transform = `translateX(-${currentScroll}px)`;
            });
        });
    </script>

    <style>
        /* Gaya untuk kontainer gambar (berita dan makanan) */
        .image-container {
            text-align: center;
            margin: 10px 0;
        }

        .image-container img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .news-item {
                flex: 1 1 100%;
                max-width: 100%;
            }

            .image-container img {
                max-height: 200px;
            }
        }

        .image-container .image-source {
            display: block;
            margin-top: 5px;
            font-size: 12px;
            color: #555;
        }

        /* Tambahan untuk food-item */
        .food-item {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .food-item h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .food-item p {
            font-size: 14px;
            color: #333;
        }

        /* Styling Carousel */
        .carousel {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            width: 100%;
        }

        /* Styling container berita */
        .news-container {
            display: flex;
            gap: 20px;
            transition: transform 0.4s ease-in-out;
        }

        /* Styling setiap item berita */
        .news-item {
            flex: 0 0 300px;
            background: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Styling untuk gambar */
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Styling sumber gambar */
        .image-source {
            display: block;
            margin-top: 8px;
            font-size: 12px;
            color: #555;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .news-item {
                flex: 0 0 250px;
            }
        }

        /* Styling tombol navigasi carousel */
        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #2e8b57;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .carousel-btn:hover {
            background-color: #246b44;
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }
    </style>
</body>

</html>
