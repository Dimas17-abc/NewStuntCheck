@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Style untuk garis tepi tabel */
        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        /* Style untuk header tabel */
        th {
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            text-align: left;
        }

        /* Style untuk sel tabel */
        td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        /* Style untuk gambar di dalam tabel */
        img {
            display: block;
            margin: auto;
        }

        /* Hover effect untuk baris tabel */
        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        td.description {
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Tabel Aksi */
        .table-actions {
            display: flex;
            align-items: center;
            /* Vertikal center */
            justify-content: center;
            /* Horizontal center */
            gap: 10px;
            /* Jarak antara tombol-tombol */
        }

        .table-actions form {
            margin: 0;
        }

        .table-actions .btn {
            font-size: 12px;
            padding: 5px 10px;
            text-align: center;
        }
    </style>
    <div class="admin-container">
        <!-- Header Admin -->
        <div class="admin-header">
            <div class="admin-info">
                <img src="{{ asset('images/human.png') }}" alt="Admin Avatar">
                <h4>{{ Auth::user()->name }}</h4>
            </div>
            <a href="{{ route('logout') }}" class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Dashboard Cards -->
        <div class="admin-dashboard">
            <div class="dashboard-card">
                <i class="fas fa-newspaper"></i>
                <h3>Total Berita</h3>
                <p>{{ $news->count() }}</p>
            </div>
        </div>

        <!-- Tabel Berita -->
        <div class="admin-tables">
            <h3>Daftar Berita</h3>
            <a href="{{ route('news.create') }}">
                <button type="button" class="btn btn-success">Tambah Berita</button>
            </a>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Sumber</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $key => $newsItem)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $newsItem->title }}</td>
                            <td class="description">{{ \Illuminate\Support\Str::limit($newsItem->description, 100, '...') }}
                            </td>
                            <td>{{ $newsItem->source }}</td>
                            <td>
                                @if ($newsItem->image)
                                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Gambar Berita"
                                        width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('news.edit', $newsItem->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel Rekomendasi Makanan -->
        <div class="admin-dashboard">
            <div class="dashboard-card">
                <i class="fas fa-newspaper"></i>
                <h3>Total Rekomendasi Makanan</h3>
                <p>{{ $foodRecommendations->count() }}</p>
            </div>
        </div>
        <div class="admin-tables">
            <h3>Daftar Rekomendasi Makanan</h3>
            {{-- <form action="{{ route('food-recommendations.create') }}" method="get">
                <button type="button" class="btn btn-success">Tambah Rekomendasi Makanan</button>
            </form> --}}
            <a href="{{ route('food-recommendations.create') }}">
                <button type="button" class="btn btn-success">Tambah Berita</button>
            </a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Sumber</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foodRecommendations as $key => $foodRecommendation)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $foodRecommendation->title }}</td>
                            <td class="description">
                                {{ \Illuminate\Support\Str::limit($foodRecommendation->description, 100, '...') }}</td>

                            <td>{{ $foodRecommendation->source }}</td>
                            <td>
                                @if ($foodRecommendation->image)
                                    <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="Gambar Makanan"
                                        width="100">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('food-recommendations.edit', $foodRecommendation->id) }}"
                                    class="btn btn-primary">Edit</a>
                                <form action="{{ route('food-recommendations.destroy', $foodRecommendation->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
