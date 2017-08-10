@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Edición de Aplicacion de Test</h1>
    <h4><a href="{{ route('aplicarTest.index') }}">Listar test Aplicados</a></h4>
    <hr />
  </div>
  <div class="row">
  
  	<form method="post" action="/aplicarTest/{{ $aplicar->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  			<input type="hidden" id="ids" name="ids"value="{{ $aplicar->id }}">

  		<div class="col-md-6">
  		<div class="form-group"> 
              <label>Paciente</label>
               
              <select disabled  name="paciente" id="paciente" class="form-control selectpicker">
                <option value="" >Seleccionar paciente</option>
                @foreach($personas as $paciente)
               
                	<?php
                                     $selected = ""
                                    
                                 ?>
                        	@if ($paciente->id == $aplicar->paciente_id)
                            	 <?php
                                     $selected = "selected"
                                 ?>
                 			@endif
                  <option @php echo($selected); @endphp  value="{{ $paciente->id }}">{{ $paciente->apellido }}, {{ $paciente->nombre}} </option>
                @endforeach
              </select>
    
  
  			</div>
  			<div class="form-group"> 
              <label>Test</label>
               
              <select disabled name="test" id="test" class="form-control selectpicker">
                <option value="" >Seleccionar test</option>
                @foreach($test as $tes)
                <?php
                                     $selected = ""
                                    
                                 ?>
                        	@if ($tes->id == $aplicar->test_id)
                            	 <?php
                                     $selected = "selected"
                                 ?>
                 			@endif
                  <option  @php echo($selected); @endphp   value="{{ $tes->id }}">{{ $tes->nombre }} </option>
                @endforeach
              </select>
    
  
  			</div>
			</div>
			<div class="col-md-6">
        			<div class="form-group">
          			<label for="Fecha">Fecha</label>
          			<input type="date" name="fecha" id="fecha" disabled value="{{$aplicar->fecha}}" class="form-control" > 	
          		</div>
          		<div class="form-group">
          			<label for="tipo_aplicacion">Tipo de Aplicacion</label>
          			<select  disabled name="tipo_aplicacion" id="tipo_aplicacion" class="form-control selectpicker">
                          <option @php if ($aplicar->tipo_aplicacion == 1){ echo ("selected");} @endphp  value="1">Diagnostico</option>
                          <option @php if ($aplicar->tipo_aplicacion == 2){ echo ("selected");} @endphp   value="2">Tratamiento</option>
                        
             		 </select> 	
          		</div>
			
			</div>
			
			<button type="button" id="aplicarT" name="aplicarT" class="btn btn-success">Comenzar Test</button>
			
			<table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  				<thead id="cabecera" name="cabecera">
	  				
	  			</thead>
	  			<tbody id="detalle"   name="detalle" >
	  				
											          		
	  			</tbody>
  			</table>
  		<button type="button" style="visibility: hidden;"  id= "finalizar"class="btn btn-success">Finalizar</button> 
  	</form>	
  
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {	
	
    $('#finalizar').on('click', function () {
        var respuesta=[];
        var pregunta=[];
    	var paciente = $('#paciente').val();
    	var test = $('#test').val();
    	var ids = $('#ids').val();
    	var fecha = $('#fecha').val();
    	var tipo_aplicacion = $('#tipo_plicacion').val();
    	var _token= "{{ csrf_token() }}";
    	var table = document.getElementById("detalle");
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).childNodes.item(0).value;
        		   nombre=  col.childNodes.item(0).childNodes.item(0).checked;
        		   preg= col.childNodes.item(0).childNodes.item(0).name;

        		   if (j==0){

        			   pregunta.push(preg);
        		   }
        		   if (nombre==true){

        			   respuesta.push(valor);
            		   }
//         		  	respuesta.push(nombre);
 					
        	   }  
        	   
        	}
    	
        var data = {test:test,_token:_token,pregunta:pregunta,respuesta:respuesta,paciente:paciente,fecha:fecha,tipo_aplicacion:tipo_aplicacion,ids:ids};
    	$.ajax({
            method: 'post',
            url: '/guardarRespuestaTest',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
//             	 document.getElementById('aplicarT').style.visibility = 'hidden';
//             	 document.getElementById('finalizar').style.visibility = 'visible';
				alert('Test Guardado');
                console.log(data);  
//                 var nombre = data[0].pid;
//                 data.forEach(recorrerdata.bind(null,nombre));

				
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert('Debe responder todas las preguntas');
                console.log(errors);
            },

        });
        
    });
});



$(document).ready(function() {	
    $('#aplicarT').on('click', function () {
    	var test = $('#test').val();
//     	$('#aplicarT').type="hidden";
        var data = {test:test};
        $.ajax({
            method: 'get',
            url: '/traerTest', 
            data:  data, 
            async: true,
            dataType:"json",   
            success: function(data){
            	 document.getElementById('aplicarT').style.visibility = 'hidden';
            	 document.getElementById('finalizar').style.visibility = 'visible';
                console.log(data);  
                var nombre = data[0].pid;
                data.forEach(recorrerdata.bind(null,nombre));
            	
//             	$('#consulta').html('	');
// 			 data.forEach(recorrerdata);
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
function recorrerdata(nom,value,index,ar){
	if (index==0){
		
		$('#cabecera').append("<tr id='cabe' name='cabe'> <th>Pregunta </th>  </tr>");
		
		pid=0;
	}else{
		
 		pid=ar[index-1].pid;
 		
 		}
		if(nom == value.pid){
    		$('#cabe').append(	
    				"<th class='col-md-1'>"+   value.rnombre  +" </th>" );
		}

		if (pid !=value.pid){
					var tr=document.createElement("TR");
					tr.id=value.pid;
// 			 			$('#detalle').append("<tr >   ");
 					var td=document.createElement("TD");
 					var b=document.createElement("B");
 					var br=document.createElement("BR");
 					var pnombre = document.createTextNode(  value.pnombre );
 					pnombre.name=value.pid;
 					b.name='pregunta'
 					b.appendChild(pnombre);
 					var pdescripcion = document.createTextNode(' ('+ value.descripcion+') ');
 					
 					var det = document.getElementById("detalle");
 					td.appendChild(b);
 					td.appendChild(pdescripcion);
 					tr.appendChild(td);
 					
//  				$('#detalle').append(   " <td> <b>"+  value.pnombre +"</b>" +" </br> "+value.descripcion+" </br> "  );
 			
		}
			var td2=document.createElement("TD");
			var center=document.createElement("center");
			var radio=document.createElement("input");
			center.name='center';
			radio.type='radio';
			radio.id='valores';
			radio.name=value.pid;
			radio.value=value.rid;
			
			center.appendChild(radio);
			var text2 = document.createTextNode(value.valor);
				td2.appendChild(center);
			if (tr){
				tr.appendChild(td2);
				
				det.appendChild(tr);}
			else	{
				 var la =	$('#tabla tr:last').attr('id');
				
				 var det = document.getElementById("detalle");
				 var fil = document.getElementById(la);
					 fil.appendChild(td2);
					
					det.appendChild(fil);
			}
//  		$('#detalle').append("<td > <center> <input type='radio' id='valores' name='"+value.pid+"' value='"+   value.valor  +"' </center>  </td>" );
		
 		if (pid !=value.pid){
 			det.appendChild(tr);
 				
		}
// 	$('#consulta').append(' <option   value='+value.id+'>'+value.fecha+' '+value.apellido+', '+value.nombre+'</option>'); 
}

</script>
@endsection