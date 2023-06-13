@extends('dashboard.layout')
@section('content')
    <div class="content-wrapper">
        <h1>Actualizar categoría {{ $category->title }}</h1>
        @include('dashboard.fragment._errors-form')
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @method('PATCH')
            @include('dashboard.category._form')
        </form>
    </div>
@endsection
