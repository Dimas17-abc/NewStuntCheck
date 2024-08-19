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
        <h1>Hello {{ Auth::user()->name }}</h1>
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
                <form action="{{route('profiles.setting')}}">
                    <i class="icon">🧮</i>
                    <p>Kalkulator</p>
                </form>
            </div>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="{{route('menus.kalkulator')}}" class="nav-link active"><span class="nav-icon">➕</span> Health</a>
        <a href="{{route('menus.home')}}" class="nav-link"><span class="nav-icon">🏠</span> Home</a>
        <a href="{{route('profiles.setting')}}" class="nav-link"><span class="nav-icon">👤</span> Profile</a>
    </div>
</body>

</html>
