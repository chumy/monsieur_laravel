@extends('layout')

@section('title', 'Recetas')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('recetas.create') }}" class="btn btn-primary">Nueva receta</a>
        </p>
    </div>

    @include('recetas.listaReceta')
    
@endsection
