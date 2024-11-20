<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lokasi Pengguna</title>
</head>
<body>
    <h1>Informasi Lokasi Anda</h1>
    @if(isset($location['error']))
        <p>{{ $location['error'] }}</p>
    @else
        <p>IP Address: {{ $location['ip'] }}</p>
        <p>Negara: {{ $location['country'] }}</p>
        <p>Wilayah: {{ $location['region'] }}</p>
        <p>Kota: {{ $location['city'] }}</p>
        <p>Latitude dan Longitude: {{ $location['location'] }}</p>
    @endif
</body>
</html>
