@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Styling untuk tabel dan elemen lainnya */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            text-align: left;
        }

        td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        img {
            display: block;
            margin: auto;
        }

        td img {
            max-width: 80px;
            max-height: 80px;
            object-fit: cover;
            border-radius: 5px;
            display: block;
            margin: auto;
        }


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

        .table-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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
            <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); showLogoutConfirmation();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- Dashboard Cards -->
        <div class="admin-dashboard">
            <div class="dashboard-card">
                <i class="fa-regular fa-newspaper"></i>
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
            <a href="{{ route('admin.results') }}">
                <button type="button" class="btn btn-success"> Berita</button>
            </a>
            <table class="table table-striped table-responsive">
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
                            <td>{{ $newsItem->source ?? 'Tidak ada sumber' }}</td>
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
                                <form action="{{ route('news.destroy', $newsItem->id) }}" method="POST"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
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
                <i class="fa-solid fa-apple-whole"></i>
                <h3>Total Rekomendasi Makanan</h3>
                <p>{{ $foodRecommendations->count() }}</p>
            </div>
        </div>
        <div class="admin-tables">
            <h3>Daftar Rekomendasi Makanan</h3>
            <a href="{{ route('food-recommendations.create') }}">
                <button type="button" class="btn btn-success">Tambah Rekomendasi Makanan</button>
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
                                    method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-btn">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tombol Download PDF -->
        <div class="admin-tables">
            <a href="{{ route('admin.downloadUsersPDF') }}" class="btn btn-success">Download Data User</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = this.closest('form');

                swalWithBootstrapButtons.fire({
                    title: "Apakah kamu yakin?",
                    text: "Kamu tidak bisa mengembalikan nya!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus",
                    cancelButtonText: "Tidak!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Dibatalkan",
                            text: "Tidak dihapus",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>

    <script>
        function showLogoutConfirmation() {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Apakah kamu yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Keluar",
                cancelButtonText: "Tidak",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
@endsection
