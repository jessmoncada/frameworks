@csrf

<div class="form-group">
    <label for="title">Titulo</label>
    <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
</div>

<div class="form-group">
    <label for="slug">Slug</label>
    <input class="form-control" type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
</div>

<div class="form-group form-inline">
    <label for="category_id">Categoría</label>
    <select class="form-control" name="category_id" id="category_id">
        <option value="">Seleccione una categoría</option>
        @foreach ($categories as $title => $id)
            <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }} value="{{ $id }}">
                {{ $title }}</option>
        @endforeach
    </select>

    <label class="ml-2" for="posted">Estado</label>
    <select class="form-control" name="posted" id="posted">
        <option {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }} value='not'>No publicado</option>
        <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value='yes'>Publicado</option>
    </select>
</div>

<div class="form-group">
    <label for="content">Contenido</label>
    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
</div>

<div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{ old('description', $post->description) }}</textarea>
</div>

@if ($task == 'edit')
    <div class="form-group">
        <label for="image">Foto</label>
        <input type="file" name="image" id="image">
    </div>
@endif
<div class="form-group">
    <a class="btn btn-primary mt-2" href="{{ url()->previous() }}" class="btn btn-secondary">Regresar</a>
    <input class="btn btn-primary mt-2" type="submit" value="Guardar">
</div>
