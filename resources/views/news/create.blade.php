@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Berita Baru</h1>
    
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Isi</label>
            <textarea name="description" id="content" rows="5" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="source">Sumber</label>
            <input type="text" name="source" id="source" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<style>
    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    h1 {
        margin-bottom: 20px;
        font-size: 2rem;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group textarea {
        resize: vertical;
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
        color: #fff;
        background-color: #007bff;
        border: none;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
@endsection
