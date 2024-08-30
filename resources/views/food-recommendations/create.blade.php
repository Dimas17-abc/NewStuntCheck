@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Rekomendasi</h1>
<div>
    {{-- <h1>Tambah Rekomendasi Makanan</h1> --}}
    <form action="{{ route('food-recommendations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Isi:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="image">Gambar:</label>
        <input type="file" id="image" name="image">
        
        <label for="source">Sumber:</label>
        <input type="text" id="source" name="source">

        <button type="submit">Simpan</button> --}}
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">Isi</label>
            <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
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
@endsection