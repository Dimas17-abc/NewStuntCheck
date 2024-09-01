<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #2e8b57;
            color: white;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h2>Daftar Pengguna</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Tipe</th>
                <th>Foto Profil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>
                    <td>
                        @if($user->profile_photo)
                            <img src="{{ public_path('storage/profile_photos/' . $user->profile_photo) }}" width="50px" height="50px">
                        @else
                            Tidak ada foto
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
