<form action="{{ route('categories.store') }}" method="POST">
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
    <input class="btn btn-primary" type="submit" value="Guardar">

</form>
