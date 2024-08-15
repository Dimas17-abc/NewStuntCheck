<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="profile-container">
        <div class="header">
            <a href="#" class="back-icon">
                <img src="{{ asset('image/back.png') }}" alt="Back" style="width: 24px;">
            </a>
            <h2>Profile</h2>
            <span class="edit-icon">✏️</span>
        </div>

        <div class="profile-pic">
            <img src="{{ asset('image/human.png') }}" alt="Profile Picture">
            <span class="edit-photo-icon">✏️</span>
        </div>

        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="Echa Hessa Maulidia" readonly>
        </div>

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="echessa@gmail.com" readonly>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="********" readonly>
        </div>

        <!-- Form untuk Logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">LOGOUT</button>
        </form>

        <div class="bottom-nav">
            <a href="#" class="nav-link active"><span class="nav-icon">➕</span> Health</a>
            <a href="#" class="nav-link"><span class="nav-icon">🏠</span> Home</a>
            <a href="#" class="nav-link"><span class="nav-icon">👤</span> Profile</a>
        </div>
    </div>
</body>

</html>
