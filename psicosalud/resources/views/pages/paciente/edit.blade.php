@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<form class="form-horizontal" action="/paciente/{{ $paciente->id }}" method="post"  id="form">
{{ method_field('PUT') }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" id="id" value="{{ $paciente->id }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nombre" id="nombre" placeholder="Nombres" class="form-control" type="text" value="{{ $paciente->persona->nombre }}">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="apellido" placeholder="Apellido" id="apellido" class="form-control"  type="text" value="{{ $paciente->persona->apellido }}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="cedula" placeholder="Cédula de identidad" id="cedula" class="form-control"  type="text" value="{{ $paciente->persona->cedula }}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input name="nacimiento" placeholder="Fecha y año de nacimiento" id="nacimiento" class="form-control"  type="date" value="{{ $paciente->persona->nacimiento }}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Lugar de nacimiento</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="lugar_nacimiento" placeholder="Lugar de nacimiento" id="lugar_nacimiento" class="form-control" type="text" value="{{$paciente->persona->lugar_nacimiento}}">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Colegio</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="colegio" placeholder="Colegio donde se realizaron los estudios primarios/secundarios" id="colegio" class="form-control" type="text" value="{{$paciente->persona->colegio}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Grado</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="grado" placeholder="Grado" class="form-control" type="text" id="grado" value="{{$paciente->persona->grado}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >RUC</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="ruc" placeholder="RUC del paciente" class="form-control" id="ruc" type="text" value="{{$paciente->ruc }}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Razón social</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="razon_social" placeholder="Razón social del paciente" id="razon_social" class="form-control"  type="text" value="{{$paciente->razon_social}}">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" id="email" placeholder="Dirección de correo" class="form-control"  type="text" value="{{ $paciente->persona->email }}">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="telefono" name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text" value="{{ $paciente->persona->telefono }}">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input id="direccion" name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text" value="{{ $paciente->persona->direccion }}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Familiares</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>Persona</th>
	  					<th>Relación</th>
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
			  		@foreach($familiares as $familiar)
			  		<tr>
			  			<td>
			  			<select name='persona' id='persona' class='form-control selectpicker'>
							<option value="{{$familiar->id}}">{{ $familiar->nombre }}  {{ $familiar->apellido }}
							</option>
							@foreach($personas as $persona)
								<option value="{{ $persona->id }}">{{$persona->nombre }} {{$persona->apellido }} </option>
							@endforeach				  			
			  			</select>
			  			</td>
			  			<td>
			  			<select name='tipo' id='tipo' class='form-control selectpicker'>
							<option value="{{$familiar->tipoId }}">{{ $familiar->tipo }}  
							</option>
							@foreach($tipos as $tipo)
								<option value="{{ $tipo->id }}">{{$tipo->nombre }}</option>
							@endforeach				  			
			  			</select>
			  			</td>
			  		</tr>
			  		@endforeach		
											          		
	  			</tbody>
  			</table>
  			<center>
    <button type="button" name="agregar" id="agregar" class="btn btn-info">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button>
    </div>
  </div>
</div>


<center><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Actualizar</button> </center>

</fieldset>
</form>
</div>


<script type="text/javascript">

$(document).ready(function() {	
    $('#agregar').on('click', function () {
    	agregarfila();
        
    });
});

function agregarfila(){
	$('#detalle').append("<tr> "+
														"<td>"+
    														
    											               
    											              "<select  name='persona' id='persona' class='form-control selectpicker'>"+
    											               " <option value='' >Seleccionar Persona</option>"+
    											                "@foreach($personas as $persona)"+
    											                  "<option   value='{{ $persona->id }}'>{{ $persona->nombre }}  {{ $persona->apellido }}</option>"+
    											                "@endforeach"+
    											              "</select>"+
											          			
											          		" </td>" +
														'<td><select  name="tipo" id="tipo" class="form-control selectpicker>'+
										                '<option value="" >Seleccionar tipo de familiar</option>'+
										               '@foreach($tipos as $tipo)'+
										                '  <option   value="{{ $tipo->id }}">{{ $tipo->nombre }} </option>'+
										                '@endforeach'+
										              '</select></td>'+
											"</tr>");
}

$(document).ready(function() {	
    $('#form').on('submit', function (e) {
    	
	    e.preventDefault();
	    var personas = [];
		var tipos=[];
		var nombre=  $('#nombre').val();
		var apellido=  $('#apellido').val();
		var email=  $('#email').val();
		var nacimiento=  $('#nacimiento').val();
		var lugar_nacimiento = $('#lugar_nacimiento').val();
		var colegio = $('#colegio').val();
		var grado = $('#grado').val();
		var telefono=  $('#telefono').val();
		var ruc=  $('#ruc').val();
		var razon_social=  $('#razon_social').val();
		var direccion=  $('#direccion').val();
		var cedula=  $('#cedula').val();
		var _token= "{{ csrf_token() }}";
		var id = $('#id').val();
        var table = document.getElementById("detalle");
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).value;

        		   if (j==0){

        			   personas.push(valor);
        		   }
        		   if (j==1){

        			   tipos.push(valor);
            		   }
        		  console.log(valor);
        	   }  
        	   
        	}
        var data = {id:id,colegio:colegio, grado:grado, lugar_nacimiento:lugar_nacimiento,nombre:nombre,apellido:apellido,email:email,nacimiento:nacimiento,telefono:telefono,ruc:ruc,razon_social:razon_social,direccion:direccion,cedula:cedula,_token:_token,personas:personas,tipos:tipos};

        $.ajax({
            method: 'post',
            url: '/actualizarPaciente',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
            	console.log(data);
             	window.location.replace("/paciente");
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
//                 alert(errors);
                console.log(data);
            },
          
        });
    	
        
    });
});



$(document).ready(function() {	
    $('#borrar_fila').on('click', function () {
    	borrarfila('detalle');
        
    });
});

function borrarfila(tableID){
	var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
            table.deleteRow(rowCount-1);
	
// 	$('#detalle').prepend();

}

</script>

@endsection