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

        <div class="content-box kalkulator-container">
            @include('menus.kalkulator')
        </div>

        <!-- Tombol Tambah Berita, Tambah Rekomendasi Makanan, dan Download Data User Khusus untuk Admin -->
        @if (Auth::user()->isAdmin())
            <div class="admin-actions">
                <a href="{{ route('news.create') }}" class="btn btn-success float-left m-2">Tambah Berita</a>
                <!-- Anda dapat menggunakan inline-block untuk tombol edit dan hapus jika menggunakan flexbox -->
                <div class="admin-buttons float-left">
                    @foreach ($news as $newsItem)
                        <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-warning m-2">Edit</a>
                        <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2">Hapus</button>
                        </form>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Artikel Stunting -->
        <div class="content-box">
            <div class="container">
                <h3>Berita Tentang Stunting di Indonesia</h3>
                <h1>Berita Terbaru</h1>
                @foreach ($news as $newsItem)
                    <div class="news-item">
                        <h2>{{ $newsItem->title }}</h2>
                        <p>{{ $newsItem->description }}</p>
                        @if ($newsItem->source)
                            <p style="font-weight: bold">Sumber:<a href="{{ $newsItem->source }}"
                                    target="_blank">{{ $newsItem->source }}</a></p>
                        @endif
                        @if ($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Gambar"
                                style="max-width: 80%; height: auto;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Artikel Nutrisi -->
        <div class="content-box">
            <section>
                @if (Auth::user()->isAdmin())
                    <div class="admin-actions">
                        <a href="{{ route('food-recommendations.create') }}" class="btn btn-success float-left m-2">
                            Tambah Rekomendasi Makanan
                        </a>
                        <!-- Tombol Edit dan Hapus -->
                        @foreach ($foodRecommendations as $foodRecommendation)
                            <a href="{{ route('food-recommendations.edit', $foodRecommendation->id) }}"
                                class="btn btn-warning float-left m-2">Edit</a>
                            <form action="{{ route('food-recommendations.destroy', $foodRecommendation->id) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-left m-2">Hapus</button>
                            </form>
                        @endforeach
                    </div>
                @endif
            </section>

            <div class="container">
                <h1 style="text-align: center">Rekomendasi Makanan</h1>
                @foreach ($foodRecommendations as $foodRecommendation)
                    <div class="food-item">
                        <h2>{{ $foodRecommendation->title }}</h2>
                        <p>{{ $foodRecommendation->description }}</p>
                        @if ($foodRecommendation->source)
                            <p style="font-weight: bold">Sumber:<a href="{{ $foodRecommendation->source }}"
                                    target="_blank">{{ $foodRecommendation->source }}</a></p>
                        @endif
                        @if ($foodRecommendation->image)
                            <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="Gambar"
                                style="max-width: 80%; height: auto;">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Kalkulator Pertumbuhan -->
        
        <div>
            <div>
                @if (Auth::user()->isAdmin())
                    <a href="{{ route('admin.downloadPdf') }}" class="btn btn-primary float-left m-2">
                        Download data user (PDF)
                    </a>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
