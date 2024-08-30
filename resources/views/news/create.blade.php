<!-- resources/views/news/create.blade.php -->

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
            <label for="content">Konten</label>
            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="source">Sumber</label>
            <input type="text" name="source" id="source" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
