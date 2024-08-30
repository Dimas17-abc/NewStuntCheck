<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kalkulator Pertumbuhan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Hasil Kalkulator Pertumbuhan</h1>
    <p>Nama User: {{ Auth::user()->name }}</p>
    <p>Email User: {{ Auth::user()->email }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Umur (bulan)</th>
                <th>Tinggi (cm)</th>
                <th>Berat (kg)</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kalkus as $kalku)
                <tr>
                    <td>{{ $kalku->name }}</td>
                    <td>{{ $kalku->age }}</td>
                    <td>{{ $kalku->height }}</td>
                    <td>{{ $kalku->weight }}</td>
                    <td>{{ $kalku->category }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
