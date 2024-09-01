@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Rekomendasi Makanan</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('food-recommendations.update', $foodRecommendation->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $foodRecommendation->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Isi</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $foodRecommendation->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="source">Sumber</label>
                <input type="text" name="source" id="source" class="form-control" value="{{ old('source', $foodRecommendation->source) }}"required>
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($foodRecommendation->image)
                    <img src="{{ asset('storage/' . $foodRecommendation->image) }}" alt="Gambar"
                        style="max-width: 100px; height: auto;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
