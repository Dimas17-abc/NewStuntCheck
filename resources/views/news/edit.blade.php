<form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Judul Berita</label>
        <input type="text" id="title" name="title" value="{{ $news->title }}" required class="form-control">
    </div>

    <div class="form-group">
        <label for="content">Konten</label>
        <textarea id="content" name="content" required class="form-control">{{ $news->content }}</textarea>
    </div>

    <div class="form-group">
        <label for="source">Sumber Berita (Link)</label>
        <input type="url" id="source" name="source" value="{{ $news->source }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="stunting_count">Jumlah Stunting</label>
        <input type="number" id="stunting_count" name="stunting_count" value="{{ $news->stunting_count }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="food_recommendation">Rekomendasi Makanan</label>
        <input type="text" id="food_recommendation" name="food_recommendation" value="{{ $news->food_recommendation }}" class="form-control">
    </div>

    <div class="form-group">
        <label for="food_image">Foto Rekomendasi Makanan</label>
        <input type="file" id="food_image" name="food_image" class="form-control">
    </div>

    <div class="form-group">
        <label for="food_source">Sumber Rekomendasi Makanan (Link)</label>
        <input type="url" id="food_source" name="food_source" value="{{ $news->food_source }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update Berita</button>
</form>
