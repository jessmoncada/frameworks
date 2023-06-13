<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Titulo</label>
        <input class="form-control" type="text" name="title" id="title"
            value="{{ old('title', $category->title) }}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug"
            value="{{ old('slug', $category->slug) }}">
    </div>
    <div class="form-group">
        <a class="btn btn-primary mt-2" href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
        <input class="btn btn-primary mt-2" type="submit" value="Guardar">
    </div>
</form>
