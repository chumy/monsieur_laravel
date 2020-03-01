<template>
    <div class="card">
        <h4 class="card-header">Nueva Receta</h4>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6>Por favor corrige los errores debajo:</h6>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('recetas') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Lentejas al oporto" value="{{ old('nombre') }}">
                </div>

                <div class="form-group">
                    <label for="personas">Personas:</label>
                    <input type="text" class="form-control" name="personas" id="personas" placeholder="4" value="{{ old('personas') }}">
                </div>

                <div class="form-group">
                    <label for="tiempo">Tiempo (en min):</label>
                    <input type="text" class="form-control" name="tiempo" id="tiempo" placeholder="40">
                </div>

        </div>
    </div>
</template>