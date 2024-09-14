@extends('layouts.app')

@section('content')
    <style>
        /* CSS untuk news.index */

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        .news-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 40px;
            color: #2e8b57;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .news-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: scale(1.05);
        }

        .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .news-content {
            padding: 20px;
        }

        .news-content h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .news-content p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .read-more {
            text-decoration: none;
            color: #2e8b57;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .news-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <div class="news-container">
        <h1>Berita Terkini</h1>

        <div class="news-grid">
            @foreach ($news as $newsItem)
                <div class="news-card">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="News Image" class="news-image">
                    <div class="news-content">
                        <h2>{{ $newsItem->title }}</h2>
                        <p>{{ Str::limit($newsItem->content, 150) }}</p>
                        <a href="{{ route('news.show', $newsItem->id) }}" class="read-more">Baca Selengkapnya</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
