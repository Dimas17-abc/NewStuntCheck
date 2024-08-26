@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Berita Baru</h1>
    
    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul Berita</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Konten</label>
            <textarea id="content" name="content" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="source">Sumber Berita (Link)</label>
            <input type="url" id="source" name="source" class="form-control">
        </div>

        <div class="form-group">
            <label for="food_image">Gambar Berita</label>
            <input type="file" id="food_image" name="food_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Tambah Berita</button>
    </form>
</div>
@endsection
