<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="toggle-buttons">
            <button class="active">Daftar</button>
            <form action="{{ route('profiles.sign_in') }}" method="GET">
                <button type="submit" class="toggle-link">Masuk</button>
            </form>
        </div>
<<<<<<< HEAD
        <form action="{{route('register')}}" method="POST">
=======
        <form action="/daftar/credetnials" method="POST">
>>>>>>> 439e065beafc921ae4803bf84f22e5d816594b82
            @csrf
            <div class="input-group">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20">
                        <path
                            d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm0 48c-88.4 0-160 71.6-160 160v32h320v-32c0-88.4-71.6-160-160-160z" />
                    </svg>
                </span>
                <input type="text" placeholder="Nama" name="name" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20">
                        <path
                            d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                    </svg>
                </span>
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20">
                        <path
                            d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                    </svg>
                </span>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20">
                        <path
                            d="M144 144l0 48 160 0 0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192l0-48C80 64.5 144.5 0 224 0s144 64.5 144 144l0 48 16 0c35.3 0 64 28.7 64 64l0 192c0 35.3-28.7 64-64 64L64 512c-35.3 0-64-28.7-64-64L0 256c0-35.3 28.7-64 64-64l16 0z" />
                    </svg>
                </span>
                <input type="password" placeholder="Konfirmasi Password" name="password_confirmation" required>
            </div>
            <div class="button-group">
                <button type="submit" class="sign-up-button">Masuk</button>
            </div>
        </form>
    </div>
</body>

</html>
