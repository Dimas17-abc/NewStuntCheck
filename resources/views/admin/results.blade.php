<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Daftar Hasil Perhitungan User</h1>
        @if($results->isEmpty())
            <p class="text-center mt-4">Belum ada data perhitungan user.</p>
        @else
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>Umur (bulan)</th>
                            <th>Tinggi (cm)</th>
                            <th>Berat (kg)</th>
                            <th>Kategori</th>
                            <th>Waktu Perhitungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr class="text-center">
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->address }}</td>
                            <td>{{ $result->nik }}</td>
                            <td>{{ $result->age }}</td>
                            <td>{{ $result->height }}</td>
                            <td>{{ $result->weight }}</td>
                            <td>{{ $result->category }}</td>
                            <td>{{ $result->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
