@extends('layout')

@section('title', "Nueva Receta :: Ingredientes")


@section('content')

<div class="row"><!-- End Main Row -->
    <div class="col-sm-8"> <!-- center --> 

        <h4 class="mb-3">Receta</h4>
        <form method="post" action="{{ route('receta.update', $receta->id) }}" id="formRec">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            
            <div class="mb-3">     
                <label for="email">Nombre: <span class="text-muted">(Optional)</span></label> 
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $receta->nombre }}">
                <div class="invalid-feedback">       
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
                </div>   
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="personas">Personas:</label>
                    <input type="text" class="form-control" name="personas" id="personas" value="{{ $receta->personas }}">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div> 
                </div>   
                <div class="col-md-6 mb-3"> 
                    <label for="tiempo">Tiempo (en min):</label>
                    <input type="text" class="form-control" name="tiempo" id="tiempo" value="{{ $receta->tiempo }}">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <form  method="POST" action="{{ route('receta.paso.del', $receta->id) }}"  id="formDelPaso"> 
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" id="delete_paso" name="delete_paso" value="0">

            <h4 class="mb-3">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Pasos</span> 
             <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pasoModal">
                    Añadir Paso
                </button>
            </h4>
            <div class="row">  <!-- Lista pasos -->   

                <table class="table mb-3">
                    <thead>
                        <tr>
                            <th>Orden</th>
                            <th>Descripcion</th>
                            <th>Comandos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
            
    
                        @foreach ( $receta->pasos()->get() as $paso )
                        <tr>
                            <td>{{ $paso->orden }}</td>      
                            <td> 
                                <p class="text-justify"> 
                                {{ $paso->descripcion }}</p>
                            </td>      
                            <td>Comandos</td>      
                            <td>
                                <a href="#" class="btn btn-link" onclick="updPaso({{ $paso->id }} )"> 
                                    <span class="oi oi-pencil"></span>
                                </a>   
                                <a href="#" class="btn btn-link" onclick="delPaso({{ $paso->id }} )"> 
                                    <span class="oi oi-trash"></span>
                                </a>   
                                </td>  
                            </tr>
                        @endforeach
                    </tbody> 
                </table>
            </div><!-- End lista pasos-->
        </form>
    
    <button class="btn btn-primary btn-lg btn-block" type="button" onclick="sendRecetas();">Guardar Cambios</button>
    </div>  <!-- end center -->
    <div class="col-sm-4"> <!-- lateral --> 
        <form method="POST" action="{{ route('receta.ingrediente.del', $receta->id) }}"  id="formDelIngrediente">
            {{ csrf_field() }}
     
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" id="delete_ing" name="delete_ing" value="0">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Ingredientes</span>     
            <!--span class="badge badge-secondary badge-pill">3</span-->   
             <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingredienteModal" onclick="modalIngrediente();">
                    Añadir Ingrediente
                </button>
        </h4>   
        <ul class="list-group mb-3">     
        @foreach ($receta->ingredientes()->get() as $ingrediente)

            <li class="list-group-item d-flex justify-content-between lh-condensed"> 
                <div>
                    <h6 class="my-0">{{ $ingrediente->nombre }}</h6>
                    <small class="text-muted" >{{ $ingrediente->cantidades->cantidad }}</small> 
                </div>     
                <a href="#" class="btn btn-link" onclick="updIngrediente({{ $ingrediente->id }} )"> 
                        <span class="oi oi-pencil"></span>
                </a>   
            <a href="#" class="btn btn-link" onclick="delIngrediente({{ $ingrediente->id }} )"> 
                        <span class="oi oi-trash"></span>
            </a>   
            </li>   

        @endforeach

        </ul>    
        </form>
        
 </div><!-- End lateral -->   
  
</div><!-- End Main Row -->    
<hr>


<div class="row">

<a href="{{ route('recetas.index') }}" class="btn btn-link">Regresar al listado de recetas</a>




</div>


<!-- Modal Ingredientes -->
<div class="modal fade" id="ingredienteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ingredienteModalTitle">Añadir Ingrediente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('receta.ingrediente.add', $receta->id) }}"  id="formAddIngrediente">
                {{ csrf_field() }}
                <input type="hidden" id="ingrediente_id" name="ingrediente_id" value="">
                <div class="modal-body">
                
    <!--div class="row"-->
                    <div class="form-group mb-3 mt-3">      
                        <label for="cantidad" class="mr-1">Cantidad</label>      
                        <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad">
                    </div>  
                    <div class="form-group mb-3">      
                        <label for="ingrediente" class="mr-1">Ingrediente</label>      
                        <input type="text" class="form-control" id="ingrediente" name="ingrediente" placeholder="nombre" autocomplete="off" >  
                        <div id="ingredienteSelect"></div>  
                
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn_add_ingrediente" class="btn btn-primary" onclick="addIngrediente();" >
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>


<!-- Modal Paos -->
<div class="modal fade" id="pasoModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="pasoModalTitle">Añadir nuevo paso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('receta.paso.add', $receta->id) }}"  id="formAddPaso">
                {{ csrf_field() }}
                <input type="hidden" id="paso_id" name="paso_id" value="">
              
 
                <div class="mb-3">
                    <label for="paso">Descripcion</label> 
                    <textarea class="form-control" id="paso" name="paso" rows="3"></textarea>
                    <div class="invalid-feedback">Please enter your shipping address.
                    </div>
                </div>
                <!-- Paso Comando-->  
                <fieldset class="border p-2">
                    <legend  class="w-auto">Instrucciones Robot</legend>
                    <div class="form-row"> <!-- first Row -->
                    
                        <div class="col-md-4 mb-3">     
                            
                            <label for="comando">Comando</label>     
                            <select class="custom-select d-block w-100" id="comando" name="comando">       
                                <option value="">Ninguna</option>  
                                @foreach ($comandos as $comando)
                                <option value="{{ $comando->id }}">{{ $comando->nombre }}</option>
                                @endforeach     
                            </select>   
                        </div>   
                        <div class="col-md-2 mb-3">     
                            <label for="velocidad">Velocidad</label>     
                            <select class="custom-select d-block w-100" id="velocidad" name="velocidad">       
                                @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor   
                            </select>
                        </div>   
                        <div class="col-md-2 mb-3">     
                            <label for="grados">Grados</label>     
                            <select class="custom-select d-block w-100" id="grados" name="grados">
                                <option value="0">0</option>
                                <option value="37">37</option>
                                <option value="45">45</option>  
                                <option value="50">50</option>  
                                <option value="55">55</option>  
                                <option value="60">60</option>  
                                <option value="60">65</option>  
                                <option value="70">70</option>  
                                <option value="75">75</option>  
                                <option value="80">80</option>  
                                <option value="85">85</option>   
                                <option value="90">90</option>  
                                <option value="95">95</option>    
                                <option value="100">100</option>  
                                <option value="105">105</option>  
                                <option value="110">110</option>  
                                <option value="115">115</option>  
                                <option value="120">120</option>
                                <option value="125">125</option>  
                                <option value="130">130</option>          
                            </select>   
                        </div>   
                    
                
                        <div class="col-md-4 mb-3">    

                                <label for="minutos">Tiempo</label>
                                
                                <div class="form-group form-inline">
                                    <select class="form-control" id="minutos" name="minutos">
                                        @for ($i = 0; $i < 100; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor        
                                    </select> :
                                    <select class="form-control" id="segundos" name="segundos">
                                        @for ($i = 0; $i < 60; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor        
                                    </select>  
                                </div>
                        </div> 
                    </div> <!-- End first row--> 
                    <div class="form-row m-2"> <!-- second row--> 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="atras" value="0" name="atras">
                            <label class="form-check-label" for="atras">Marcha Atrás</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="mariposa" value="0" name="mariposa">
                            <label class="form-check-label" for="mariposa">Mariposa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cestillo" value="0" name="cestillo">
                            <label class="form-check-label" for="cestillo">Cestillo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="cubilete" value="0" name="cubilete">
                            <label class="form-check-label" for="cubilete">Sin Cubilete</label>
                        </div>
                        
                    </div> <!-- End second row-->      
                </fieldset>  
            </form>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" id="btn_add_ingrediente" class="btn btn-primary" onclick="addPaso();" >
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Guardar Cambios
        </button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

function sendRecetas(){
     $('#formRec').submit();
}

var ingredientesReceta=[
@foreach ($receta->ingredientes()->get() as $ingrediente)
    {id:{{$ingrediente->id}}, nombre:"{{$ingrediente->nombre}}", cantidad:"{{$ingrediente->cantidades->cantidad}}"},
@endforeach 
];

var pasosReceta=[
@foreach  ( $receta->pasos()->get() as $paso )
    {id:{{$paso->id}}, nombre:"{{$paso->descripcion}}", temperatura:"{{$paso->temperatura}}",
    orden: "{{$paso->orden}}", comando: "{{$paso->comando_id}}", mariposa: "{{$paso->mariposa}}", 
    atras: "{{$paso->atras}}", cubilete: "{{$paso->cubilete}}", cestillo: "{{$paso->cestillo}}", 
    velocidad: "{{$paso->velocidad}}", 
    minutos: "{{floor( $paso->tiempo / 60) }}" , segundos: "{{$paso->tiempo % 60 }}", 
    },
@endforeach 
];

var content='';

function addIngrediente(){


    $('#formAddIngrediente').submit();
}

function delIngrediente(id){

    $('#delete_ing').val(id);
    $('#formDelIngrediente').submit();
}


function modalIngrediente(){
    $('#ingredienteModalTitle').html("Añadir Ingrediente");
    $('#ingrediente').attr("disabled", false);
    $('#ingredienteModal').modal('toggle');
}

function updIngrediente(id){

    $('#ingredienteModalTitle').html("Modificar Ingrediente");
    $('#ingrediente').attr("disabled", true);
    $('#ingredienteModal').modal('toggle');
    $('#ingrediente_id').val(id);
    for (i=0; i<ingredientesReceta.length; i++){
        if (ingredientesReceta[i].id === id){
            $('#cantidad').val(ingredientesReceta[i].cantidad);
            $('#ingrediente').val(ingredientesReceta[i].nombre);
            break;
        }
    }
    //$('#ingrediente').keyup(Respond); 


};

//$('#ingrediente').keyup(Respond); 

function Respond() { 
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

   
} 


function addPaso(){

    $('#formAddPaso').submit();

}

function delPaso(id){

    $('#delete_paso').val(id);
    $('#formDelPaso').submit();

}

function updPaso(id){

    $('#pasoModalTitle').html("Modificar Paso");
    $('#pasoModal').modal('toggle');
    $('#paso_id').val(id);
    for (i=0; i<pasosReceta.length; i++){
        if (pasosReceta[i].id === id){
            $('#paso').val(pasosReceta[i].nombre);
            $('#comando').val(pasosReceta[i].comando);
            $('#mariposa').attr('checked', (pasosReceta[i].mariposa == 1) ? true : false);
            $('#cubilete').attr('checked', (pasosReceta[i].cubilete == 1) ? true : false);
            $('#atras').attr('checked', (pasosReceta[i].atras == 1) ? true : false);
            $('#cestillo').attr('checked', (pasosReceta[i].cestillo == 1) ? true : false);
            $('#velocidad').val(pasosReceta[i].velocidad);
            $('#temperatura').val(pasosReceta[i].temperatura);
            $('#minutos').val(pasosReceta[i].minutos);
            $('#segundos').val(pasosReceta[i].segundos);
    
            break;
        }
    }
};

/*
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
*/

function autocomplete(inp, arr, campoId) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      campoId.value = "";
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].nombre.substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].nombre.substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].nombre.substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i].nombre + "' id='"+ arr[i].id +"' >";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              console.log(this.getElementsByTagName("input")[0].id)
              campoId.value = this.getElementsByTagName("input")[0].id;
              
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}

var listaIngredientes=[
@foreach ($listaIngredientes as $ingrediente)
    {id:{{$ingrediente->id}}, nombre:"{{$ingrediente->nombre}}"} ,
@endforeach 
];


autocomplete(document.getElementById("ingrediente"), listaIngredientes, ingrediente_id);


</script>

@endsection