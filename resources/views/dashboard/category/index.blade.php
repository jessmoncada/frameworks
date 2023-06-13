@extends('dashboard.layout')
@section('content')
    <a class="btn btn-success my-3" href="{{ route('category.create') }}">Crear categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre categoría</th>
                <th>Slug</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->slug }}</td>
                    <td width="10px">
                        <a class="mt-2 btn btn-primary" href="{{ route('category.edit', $c) }}">Editar</a>
                        <a class="mt-2 btn btn-primary" href="{{ route('category.show', $c) }}">Ver</a>
                        <form action="{{ route('category.destroy', $c) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button class="mt-2 btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
