@extends('layout')

@section('title', "Nueva Receta")


@section('content')
<div class="row">

    <div class="card my-4 col col-lg">
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

            <form method="POST" action="/receta" id="formRec">
                {{ csrf_field() }}
                <input type="hidden" id="ingredientes">
            
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Lentejas al oporto" value="{{ old('nombre') }}">
                </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="personas">Personas:</label>
                        <input type="text" class="form-control" name="personas" id="personas" placeholder="4" value="{{ old('personas') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tiempo">Tiempo (en min):</label>
                        <input type="text" class="form-control" name="tiempo" id="tiempo" placeholder="40">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-1"></div>

</div>
</div>
</div>
<div class="row">
<button type="submit" class="btn btn-primary" >Crear receta</button>
<a href="{{ route('recetas.index') }}" class="btn btn-link">Regresar al listado de recetas</a>
</form>
</div>



@endsection