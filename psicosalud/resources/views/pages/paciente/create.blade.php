@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}
<form class="form-horizontal" id="form" action="/paciente" method="post" userd="contact_form">
<center><img class="img-responsive" src="/img/paciente.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
<center><h2 >Registro de pacientes</h2></center>
<br />
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-6 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required  id="nombre"   name="nombre" placeholder="Nombres" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="apellido" required  name="apellido" placeholder="Apellidos" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="cedula"  required name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input id="nacimiento" required  name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Lugar de nacimiento</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="lugar_nacimiento" required placeholder="Lugar de nacimiento" class="form-control" type="text" >
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Colegio</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="colegio" placeholder="Colegio donde se realizaron los estudios primarios/secundarios" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Grado</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="grado" placeholder="Grado" class="form-control" type="text" >
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >RUC</label> 
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input  id="ruc"  name="ruc" required placeholder="RUC del paciente" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Razón social</label> 
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input id="razon_social" required name="razon_social" placeholder="Razón social del paciente" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="email" required name="email" placeholder="Dirección de correo" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input id="telefono" required  name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input  id="direccion" required  name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text">
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
	  				
											          		
	  		</tbody>
  			</table>
  			<center>
    <button type="button" name="agregar" id="agregar" class="btn btn-info">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button>
    </div>
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <center><button type="submit" class="btn btn-success" >Guardar <span class="glyphicon glyphicon-send"></span></button></center>
  </div>
</div>

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
		var telefono=  $('#telefono').val();
		var ruc=  $('#ruc').val();
		var razon_social=  $('#razon_social').val();
		var direccion=  $('#direccion').val();
		var cedula=  $('#cedula').val();
		var _token= "{{ csrf_token() }}";
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
        		  
        	   }  
        	   
        	}
        var data = {nombre:nombre,apellido:apellido,email:email,nacimiento:nacimiento,telefono:telefono,ruc:ruc,razon_social:razon_social,direccion:direccion,cedula:cedula,_token:_token,personas:personas,tipos:tipos};

        $.ajax({
            method: 'post',
            url: '/guardarPaciente',
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