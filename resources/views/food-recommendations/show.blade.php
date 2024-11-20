<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $foodRecommendation->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container">
        <h1>{{ $foodRecommendation->title }}</h1>
        <p>{{ $foodRecommendation->description }}</p>

        @if ($foodRecommendation->image)
            <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="{{ $foodRecommendation->title }}"
                style="max-width: 100%; height: auto;">
        @endif
        <div>
            <small>Sumber: {{ $foodRecommendation->source ?? 'Tidak ada sumber' }}</small>
            <br><br>
        </div>
        <a href="{{ route('menus.home') }}" class="back-btn">Kembali ke Beranda</a>
    </div>
</body>

</html>
