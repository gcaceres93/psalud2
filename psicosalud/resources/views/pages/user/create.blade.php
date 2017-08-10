@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Usuarios</h1>
    <h4><a href="{{ route('user.index') }}">Listar usuarios</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/user">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group"> 
      <label>Persona</label>
       
      <select required  name="persona" id="persona" class="form-control selectpicker">
        <option value="" >Seleccionar persona</option>
        @foreach($personas as $persona)
          <option   value="{{ $persona->id }}">{{ $persona->apellido }}, {{ $persona->nombre}} </option>
        @endforeach
      </select>
    
  
  	</div>
  			
  		<div class="form-group">
  			<label for="descripci&oacute;n">Nombre</label>
  			<input type="text" name="name" required id="name" class="form-control" placeholder="Nombre del Usuario"> 	
  		</div>
      <div class="form-group">
        <label for="E-mai">E-mail</label>
        <input type="text" name="email" id="email" required class="form-control" placeholder="E-mail del Usuario">   
      </div>
      <div class="form-group">
        <label for="Contraseña">Contraseña</label>
        <input type="password" " name="password"  required class="form-control" placeholder="Contraseña del Usuario">   
      </div>
      
      <div class="form-group"> 
      <label> Seleccionar Roles</label>
       
		<br/>
        @foreach($roles as $rol)
         <input  type="checkbox" name="roles[]" id = "roles" value="{{ $rol->id }}" />{{ $rol->nombre }}<br />
          
        @endforeach
    
    
  
  	</div>

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {	
    $('#persona').on('change', function () {
    	var persona = $('#persona').val();
//     	$('#aplicarT').type="hidden";
        var data = {persona:persona};
        $.ajax({
            method: 'get',
            url: '/traerDatos', 
            data:  data, 
            async: true,
            dataType:"json",   
            success: function(data){
            	
            	
//             	$('#consulta').html('	');
 			 data.forEach(recorrerdata);
// 				borrarfila('detalle');
// 				agregarfila();
// // 				$('#factura_concepto').value(1);
// 				 data.forEach(recorrerconsulta);
				
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
               
                console.log(errors);
            },

        });
        
    });
});
function recorrerdata(ar,value,index){
	
	var nombre = ar.nombre + ' ' + ar.apellido; 
	var email = ar.email;
	
	$('#name').val(nombre);
	$('#email').val(email);
}
</script>
@endsection