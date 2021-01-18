

@if ($recetas->isNotEmpty())
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tiempo</th>
            <th scope="col">Personas</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recetas as $receta)
        <tr>
            <th scope="row">{{ $receta->id }}</th>
            <td>{{ $receta->nombre }}</td>
            <td>{{ $receta->tiempo }}</td>
            <td>{{ $receta->personas }}</td>
            <td>
                <form action="{{ route('receta.destroy', $receta) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ route('receta.show', $receta) }}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                    <a href="{{ route('receta.edit', $receta) }}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
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

