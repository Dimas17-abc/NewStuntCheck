<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuntCheck</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/image.png') }}" alt="Logo" class="logo">
        <div class="header">
            <h1>Pantau Pertumbuhan Anak</h1>
            <p>Cegah Stunting dengan StuntCheck</p>
        </div>
        <form action="{{ route('profiles.sign_in') }}" method="GET">
            <button type="submit" class="get-started-btn">Get Started</button>
        </form>
    </div>
</body>

</html>
