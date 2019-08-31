@extends('layout')

@section('title', 'Recetas')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('recetas.create') }}" class="btn btn-primary">Nueva receta</a>
        </p>
    </div>

    @if ($recetas->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recetas as $receta)
        <tr>
            <th scope="row">{{ $receta->id }}</th>
            <td>{{ $receta->nombre }}</td>
            <td>
                <form action="{{ route('recetas.destroy', $receta) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('recetas.show', $receta) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{ route('recetas.edit', $receta) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                    <button type="submit" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>No hay recetas registradas.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection