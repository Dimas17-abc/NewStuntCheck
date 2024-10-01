@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Berita</h1>
    
    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('news.update', $newsItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $newsItem->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $newsItem->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="source">Sumber (URL):</label>
            <input type="text" class="form-control" id="source" name="source" value="{{ old('source', $newsItem->source) }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar:</label>
            <input type="file" class="form-control" id="image" name="image">
            @if ($newsItem->image)
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="Gambar" style="max-width: 100px; height: auto;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
