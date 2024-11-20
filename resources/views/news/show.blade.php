<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="container">
        <h1>{{ $newsItem->title }}</h1>
        <p>{{ $newsItem->description }}</p>
        @if ($newsItem->image)
            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}"
                style="max-width: 100%; height: auto;">
        @endif
        <small>Sumber: {{ $newsItem->source ?? 'Tidak ada sumber' }}</small>
        <br><br>
        <a href="{{ route('menus.home') }}" class="back-btn">Kembali ke Beranda</a>
    </div>
</body>

</html>
