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

    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            box-sizing: border-box;
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
