@extends('layout')

@section('title', 'Recetas')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3 row">
        <h1 class="pb-1">{{ $receta->nombre }}</h1>
        
    </div>
    <hr>
    <div class="row">
        <div class="col-sm">
            {{ $receta->personas }} Personas
        </div>
        <div class="col-sm">
            Tiempo: 
            @if ( floor($receta->tiempo  / 60) > 0 )
                {{ floor($receta->tiempo / 60) }} :
            @endif
            {{ floor($receta->tiempo % 60) }} 
            
        </div>
        <div class="col-sm">
            {{ $receta->nombre }}
        </div>
      </div>
    <hr>
    <div class="row">
        <div id="ingredientes" class="col-4">
            <div id="listado" class="row">
                <h3>Ingredientes</h3>
                <ul class="list-group list-group-flush">
                    @foreach ($receta->ingredientes()->get() as $ingrediente)
                        <li class="list-group-item">{{ $ingrediente->cantidades->cantidad }} {{ $ingrediente->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="vl col "></div>
        <div id="pasos"class="col-7 m8">
            <h3>Pasos</h3>

            @foreach  ( $receta->pasos()->get() as $paso )
            <div class="row paso" id="paso{{$paso->id}}">
                {{$paso->descripcion}}
            </div>
            <div class="row paso" id="paso_com_{{$paso->id}}">
                @if ($paso->comando_id > 0)
                    <div class="col">
                        <img src="{{ asset('images/'.$paso->comando()->get()[0]->imagen) }}"  class="img-thumbnail img-icono" alt="{{$paso->comando()->get()[0]->nombre}} ">
                       
                    </div>
                @endif  
                @if ($paso->temperatura>0)
                    <div class="col">
                       Temp: {{$paso->temperatura}} *C
                    </div>
                @endif
                @if ($paso->velocidad>0)
                    <div class="col">
                       Vel: {{$paso->velocidad}} 
                    </div>
                @endif
                @if ($paso->tiempo>0)
                    <div class="col">
                       Tiempo:  {{ floor($receta->tiempo / 60) }} : {{ $receta->tiempo % 60 }} 
                    </div>
                @endif
                @if ($paso->mariposa>0)
                    <div class="col">
                       Mariposa
                    </div>
                @endif
                @if ($paso->mariatrasposa>0)
                    <div class="col">
                       Atras
                    </div>
                @endif
                @if ($paso->cubilete>0)
                    <div class="col">
                       Sin cubilete
                    </div>
                @endif
                @if ($paso->cestillo>0)
                    <div class="col">
                       Con cestillo
                    </div>
                @endif

                    
                
            </div>
            <hr>
            @endforeach 
            
        </div>
    </div>
    
@endsection