<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Berita</title>
</head>

<body>
    <h1>Update Berita</h1>
    <form action="{{ url('/update-news') }}" method="POST">
        @csrf
        <div>
            <label for="news-content">Konten Berita:</label>
            <textarea id="news-content" name="news_content" rows="4" cols="50">{{ old('news_content') }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>
