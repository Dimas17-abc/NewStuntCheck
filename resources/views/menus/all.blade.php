<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuntCheck Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="welcome-text">
                <h1>Hello Echa</h1>
                <p>Selamat Datang di StuntCheck!</p>
            </div>
            <div class="profile">
                <img src="profile.jpg" alt="Profile Picture" class="profile-pic">
            </div>
        </div>
        
        <div class="menu">
            <!-- Menu Artikel -->
            <div class="menu-item">
                <div class="icon artikel-icon"></div>
                <p>Artikel</p>
                <a href="{{route('news.index')}}">Lihat Artikel</a>
            </div>

            <!-- Menu Nutrisi -->
            <div class="menu-item">
                <div class="icon nutrisi-icon"></div>
                <p>Nutrisi</p>
                <a href="{{route('food-recommendations.index')}}">Lihat Nutrisi</a>
            </div>

            <!-- Menu Kalkulator -->
            <div class="menu-item">
                <div class="icon kalkulator-icon"></div>
                <p>Kalkulator</p>
                <a href="{{route('menus.kalkulator')}}">Buka Kalkulator</a>
            </div>
        </div>
    </div>
</body>
</html>
