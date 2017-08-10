@extends('layouts.master')

@section('main_content')




<div class="container">
 	<form method="post" action="/diagnostico/{{ $diagnostico->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="row">
  	<div class="col-md-6">
        <h1>Diagnóstico N° {{ $diagnostico->id }}</h1>
        <hr />
    </div>
   <center><img class="img-responsive" src="/img/lupa.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/diagnostico">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" id="anamnesis" name="anamnesis" value="{{ $diagnostico->aid }}"/>
        <input type="hidden" id="paciente"  name="paciente" value="{{ $diagnostico->pid }}"/>
        <input type="hidden" id="ids"  name="ids" value="{{ $diagnostico->id }}"/>
        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $diagnostico->pid)  }}" > {{ $diagnostico->pid }} - {{$diagnostico->pnombre}}  {{$diagnostico->papellido}} </a>
        			
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Anamnesis:</label>
        			<a href="{{ route('anamnesis.show', $diagnostico->aid)  }}" >{{$diagnostico->aid }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($diagnostico->fecha)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Consulta asociada:</label>
				<select required  id="consulta" name="consulta" class="form-control selectpicker">
                    <option value="{{$diagnostico->cid}}" >{{ $diagnostico->fecha }}</option>
                   	@foreach($consultas as $consulta)
                   	   <option value="{{ $consulta->id }}" >{{ $consulta->fecha }}</option>
                   	@endforeach
             	</select>        		
             	</div>
        	</div>
 		</div>
  		<br/>
  		@endif
  		
  		
  		<div class="row">
  		<div class="col-md-12">
  		<label for="tabla">Tests Aplicados:</label>
  		<table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>Test</th>
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
	  				@foreach($test_diagnosticado as $test)
                   	   <tr> 
														<td>
    											              <select  name='test' id='test' class='form-control selectpicker'>
    											                <option value='' >Seleccionar Test</option>
    											                @foreach($test_aplicados  as $testa)
    											                   <?php
                                                                                 $selected = ""
                                                                                
                                                                             ?>
    											                	@if ($test->test_id == $testa->id)
    											                	<?php
                                                                                 $selected = "selected"
                                                                             ?>
    											                	@endif 
    											                  <option <?php echo ($selected) ?>   value='{{ $testa->id }}'>{{ $testa->fecha }} / {{ $testa->nombre }} / {{ $testa->resultado }} </option>
    											                  
    											                @endforeach
    											              </select>
											          			
											          		
											</tr>
                   	@endforeach
											          		
	  		</tbody>
  			</table>
    <button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button>
  	</div>
  	</div>
  			
  
  		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Diagnóstico presuntivo:</label>
              <textarea  name="diagnostico_presuntivo" class="form-control" rows="5" id="diagnostico_presuntivo">{{ $diagnostico->diagnostico_presuntivo }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Diagnóstico final:</label>
              <textarea name="diagnostico_final" required  class="form-control" rows="5" id="diagnostico_final">{{ $diagnostico->diagnostico_final }}</textarea>
            </div>
		</div>
		
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Observaciones:</label>
              <textarea name="observaciones" required  class="form-control" rows="5" id="observaciones">{{ $diagnostico->observaciones }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Resultado obtenido:</label>
              <textarea name="resultado_obtenido" required  class="form-control" rows="5" id="resultado_obtenido">{{ $diagnostico->resultado_obtenido }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Recomendaciones:</label>
              <textarea name="recomendaciones" required class="form-control" rows="5" id="recomendaciones">{{ $diagnostico->recomendaciones }}</textarea>
            </div>
		</div>
		
	
		
		<div class="form-group">
              <label for="acepta_tratamiento">¿Acepta tratamiento?</label> 
                 @if($diagnostico->acepta_tratamiento)
                 <input id="acepta_tratamiento"  type="checkbox" name="acepta_tratamiento" value="1" checked>
                 @else
                 <input id="acepta_tratamiento"  type="checkbox" name="acepta_tratamiento" value="1">   
                 @endif              
		</div>
			  		<center><button type="button" name="guardar" id="guardar" class="btn btn-success">Actualizar</button></center>
		
		<br/>
		
		
	</form> 
	    
  </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {	
    $('#agregar').on('click', function () {
    	agregarfila();
        
    });

    $('#borrar_fila').on('click', function () {
    	borrarfila('detalle');
        
    });
    
});
function agregarfila(){
	$('#detalle').append("<tr> "+
														"<td>"+
    														
    											               
    											              "<select  name='test' id='test' class='form-control selectpicker'>"+
    											               " <option value='' >Seleccionar Test</option>"+
    											                "@foreach($test_aplicados  as $testa)"+
    											                  "<option   value='{{ $testa->id }}'>{{ $testa->fecha }} / {{ $testa->nombre }} / {{ $testa->resultado }} </option>"+
    											                "@endforeach"+
    											              "</select>"+
											          			
											          		
											"</tr>");
}


$(document).ready(function() {	
	$( '#guardar' ).on( 'click', function(e) {
	    e.preventDefault();
	    var anamnesis = $('#anamnesis').val();
	    var ids = $('#ids').val();
	    var paciente = $('#paciente').val();
        var consulta = $('#consulta').val();
        var diagnostico_presuntivo = $('#diagnostico_presuntivo').val();
        var diagnostico_final = $('#diagnostico_final').val();
        var observaciones = $('#observaciones').val();
        var resultado_obtenido = $('#resultado_obtenido').val();
        var recomendaciones = $('#recomendaciones').val();
        var acepta_tratamiento = $('#acepta_tratamiento').val();
        var table = document.getElementById("detalle");
        var test=[];
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).value;
        		   nombre= col.childNodes.item(0).name;

        		   if (j==0){

        			   test.push(valor);
        		   }
        		  
 					
        	   }  
        	   
        	}
		console.log(test);
		
        var data = {ids:ids,anamnesis:anamnesis,paciente:paciente,test:test,consulta:consulta,diagnostico_presuntivo:diagnostico_presuntivo,diagnostico_final:diagnostico_final,observaciones:observaciones,resultado_obtenido:resultado_obtenido,recomendaciones:recomendaciones,acepta_tratamiento:acepta_tratamiento, _token: "{{ csrf_token() }}"};
		
        $.ajax({
            method: 'post',
            url: '/diagnosticoGuardar',
            data:  data,
            success: function(data){
            		console.log(data);
//             		$("#success").removeClass("hidden");       			   		
//             	    $("body").scrollTop($("#success").offset().top);
//             	    $(".container :input").attr("disabled", true);
//             	    $(".well-lg :input").attr("disabled", false);
//             	    $("#success").attr("disabled", false);
//             	    $("#success").fadeOut(1800);
						window.location.replace("/diagnostico/".concat(data));
            		 // return redirect()->route('diagnostico.show',$diagnostico->id);
					

            	
            },
            error: function(data){
            	var errors = data.responseJSON;
            	console.log(data);
            },

        });
    });
});

</script>


@endsection