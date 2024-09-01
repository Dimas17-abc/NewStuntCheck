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
@endsection
