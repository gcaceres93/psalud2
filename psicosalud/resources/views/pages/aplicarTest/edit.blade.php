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

  		<div class="col-md-6">
  		<div class="form-group"> 
              <label>Paciente</label>
               
              <select  name="paciente" id="paciente" class="form-control selectpicker">
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
               
              <select  name="test" id="test" class="form-control selectpicker">
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
          			<input type="date" name="fecha" id="fecha" value="{{$aplicar->fecha}}" class="form-control" > 	
          		</div>
          		<div class="form-group">
          			<label for="tipo_aplicacion">Tipo de Aplicacion</label>
          			<select  name="tipo_aplicacion" id="tipo_aplicacion" class="form-control selectpicker">
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
<!--   		<button type="submit" class="btn btn-success">Actualizar</button> -->
  	</form>	
  
  </div>
</div>
<script type="text/javascript">
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
                alert(errors);
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
 		if (pid !=value.pid){
 			$('#detalle').append(" </fieldset></tr> ");
 				
		}
 		}
		if(nom == value.pid){
    		$('#cabe').append(	
    				"<th class='col-md-1'>"+   value.rnombre  +" </th>" );
		}

		if (pid !=value.pid){
 			$('#detalle').append("<tr > <fieldset id="+value.pid+"'>");
 				$('#detalle').append("<td >"+   "<b>"+  value.pnombre +"</b>" +" </br> "+value.descripcion  +" </td>" );
		}
 		$('#detalle').append("<td > <center> <input type='radio' id='valores' name='"+value.pid+"' value='"+   value.valor  +"' </center>  </td>" );
 	
// 	$('#consulta').append(' <option   value='+value.id+'>'+value.fecha+' '+value.apellido+', '+value.nombre+'</option>'); 
}

</script>
@endsection