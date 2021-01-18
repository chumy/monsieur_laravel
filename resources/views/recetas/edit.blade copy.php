@extends('layout')

@section('title', "Nueva Receta :: Ingredientes")


@section('content')
<div class="row">
        <form method="post" action="{{ route('receta.update', $receta->id) }}"" id="formRec">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="receta_id" value={{ $receta->id }}>
                <input type="hidden" id="ingrediente_id" name="ingrediente_id" value="">
                <input type="hidden" id="delete_ing" name="delete_ing" value="0">
                <input type="hidden" id="paso_id" name="paso_id" value="">
                <input type="hidden" id="delete_paso" name="delete_paso" value="0">
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

           
                <input type="hidden" id="ingredientes">
            
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $receta->nombre }}">
                </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="personas">Personas:</label>
                        <input type="text" class="form-control" name="personas" id="personas" value="{{ $receta->personas }}">
                        
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="tiempo">Tiempo (en min):</label>
                        <input type="text" class="form-control" name="tiempo" id="tiempo" value="{{ $receta->tiempo }}">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-1"></div>
    <div class="card my-4 col col-lg">

        <h4 class="card-header">Ingredientes</h4>
        <div class="card-body">

                
                <div class="form-group row">
                    <div class="col-4">
                    <label for="cantidad">Cantidad:</label>
                    </div>

                    <div class="col-6">
                            <label for="ingrediente">Nombre:</label>
                    </div>
                    <div class="col-2">
                            <label for="accion">Añadir Ingrediente:</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-4">
                        <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="100" value="{{ old('cantidad') }}">
                    </div>
                    <div class="col-6">
                        
                        <input type="text" class="form-control" name="ingrediente" id="ingrediente" placeholder="Harina" autocomplete="off" >
                        
                        <div id="ingredienteSelect">
                        </div>                 
                    </div>
                    <div class="col-2">
                        
                            <button type="button" id="btn_add_ingrediente" class="btn btn-primary" onclick="addIngrediente();" disabled >
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                            </button>
                        </div>
                </div>
                <div class="form-group row" id="listaIngredientes">
                        
                                <div class="col-4">  
                                        <label for="cantidad">Cantidad:</label>
                                        </div>
                    
                                        <div class="col-6">
                                                <label for="ingrediente">Nombre:</label>
                                        </div>
                                        <div class="col-2">
                                                <label for="accion">Eliminar Ingrediente:</label>
                                        </div>
                                    </div>
                </div>

                @foreach ($receta->ingredientes()->get() as $ingrediente)
                
                <div class="form-group row" >
                        
                    <div class="col-4">  
                        {{ $ingrediente->cantidades->cantidad }}
                    </div>
            
                    <div class="col-6">
                        {{ $ingrediente->nombre }}
                    </div>
                    <div class="col-2">
                            
                            <button type="button" class="btn btn-primary" onclick="delIngrediente({{ $ingrediente->id }} )">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Del
                            </button>
                    </div>
                </div>
                    
                @endforeach
         </div>
    </div>
</div>
</div>
</div>
<div class="row">
<button type="button" class="btn btn-primary" onclick="sendRecetas();">Crear receta</button>
<a href="{{ route('recetas.index') }}" class="btn btn-link">Regresar al listado de recetas</a>
</form>
</div>

<script type="text/javascript">
var ingredientes=[];
var content='';

function addIngrediente(){

$('#formRec').submit();


}

function delIngrediente(id){
    
    $('#delete_ing').val(id);
    $('#formRec').submit();
    
    
    }

    function delPaso(id){
    
    $('#delete_paso').val(id);
    $('#formRec').submit();
    
    
    }
$(document).ready(function(){




$('#ingrediente').keyup(function(){ 
        var query = $(this).val();
        $('#ingrediente_id').value=0; 
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('complete') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
                $('#ingredienteSelect').fadeIn();  
                $('#ingredienteSelect').html(data);
                
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#ingrediente').val($(this).text());  
        $('#ingrediente_id').val($(this).attr('id')); 
        $('#ingredienteSelect').fadeOut();  
        $('#btn_add_ingrediente').attr('disabled', false);
    });  

});
  </script>

@endsection