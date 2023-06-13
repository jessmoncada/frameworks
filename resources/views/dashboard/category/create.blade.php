@extends('dashboard.layout')

@section('content')
    <h1>Crear de Categoría de publicaciones</h1>
    @include('dashboard.fragment._errors-form')
    <form action="{{ route('categories.store') }}" method="post">
        @include('dashboard.category._form')
    </form>
@endsection
