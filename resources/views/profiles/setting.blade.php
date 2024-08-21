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
            <a href="{{route('menus.home')}}" class="back-icon">
                <img src="{{ asset('images/back.png') }}" alt="Back" style="width: 24px;">
            </a>
            <h2>Profile</h2>
            <span class="edit-icon">✏️</span>
        </div>

        <div class="profile-pic">
            <img src="{{ $user->profile_photo ? asset('storage/profile_photos/' . $user->profile_photo) : asset('images/human.png') }}" alt="Profile Picture" id="profileImage">
            <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="photo" class="edit-photo-icon">✏️</label>
                <input type="file" id="photo" name="photo" accept="image/*" style="display: none;" onchange="this.form.submit()">
            </form>
        </div>
        

        <div class="input-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
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
    </div>
</body>

</html>
