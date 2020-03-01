@extends('layout')

@section('title', "Nueva Receta")


@section('content')
<div class="row">
<div class="card my-4">
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
    <div class="card">
        <h4 class="card-header">Ingredientes</h4>
        <div class="card-body">

            
                <div class="form-group row">
                    <div class="col">
                    <label for="cantidad">Cantidad:</label>
                    </div>
                    <div class="col">
                            <label for="medida">medida:</label>
                    </div>
                    <div class="col">
                            <label for="ingrediente">Ingrediente:</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="100" value="{{ old('cantidad') }}">
                    </div>
                    <div class="col">
                        <select id="medida" name="medida">
                        @foreach($medidas as $medida)
                        <option value="{{ $medida->id }}">{{$medida->nombre}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="ingrediente" id="ingrediente" placeholder="Harina">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Crear receta</button>
                <a href="{{ route('recetas.index') }}" class="btn btn-link">Regresar al listado de recetas</a>
            </form>
        </div>
    </div>
</div>
@endsection