@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Respuestas</h1>
    <?php 
foreach($preg as $key=>$asaniu){
    
                     
       						if ($key == 'nombre'){
          						
          							$titulo = $asaniu->nombre;
                                }
          						
          					if ($key == 'descripcion'){
          						 
          					    $descrip = $asaniu->descripcion;
          							
          					}
          					if ($key == 'test_id'){
          					    
          					    $test = $asaniu->test_id ;
          					    
          					}
          					if ($key == 'id'){
          					    
          					    $pregunta_id = $asaniu->id ;
          					    
          					}
          				
          					
}		
          	?>
     <h4><a href="{{ route('test.edit', $test) }}">Volver al Test</a></h4> 


    	<form method="post" action="/test">
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" >

      {{ method_field('PUT') }}
  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
  	<input type="hidden" name="pregunta_id" id="pregunta_id" value="{{ $pregunta_id }}">
   </div>
</div>
  		
 <h2> 		<?php echo ($titulo) ?> </h1> 
 <h3> <?php echo ($descrip) ?> </h1> 
  	<div class="form-group">
      <div class="col-md-12	">
      <label for="preguntas">Preguntas Test</label>
  	 <table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  		
  				<thead>
	  				<tr class="table table-info">
	  				<th>ID Respuesta </th>
	  					<th>Respuesta</th>
	  					<th>Valor</th>
	  					
	  					
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
	  			@if ($pregrep)
	  				@foreach ($pregrep as $respuestas)
	  				<tr>

													 <td class="col-md-1	"><input type="text" disabled name="asaniu"  id="asaniu" class="form-control" placeholder="ID Pregunta" readonly value="{{$respuestas->id}}" ></td>
														
														<td><input type="text" name="nombre" disabled id="nombre" class="form-control" placeholder=" Respuesta" value="{{$respuestas->nombre}}" > 	</td>
													
														 <td><input type="number" name="valor" disabled  id="valor" class="form-control" placeholder="Valor de la Respuesta" value="{{$respuestas->valor}}"></td>
 														
														
											</tr>
					@endforeach
				@endif	
	  		</tbody>
  			</table>
<!--     <button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button> -->
  	</div>
  	<div class="col-md-12	">
  	</br>
<!--   	 <button type="submit" id="guardar" name="guardar" class="btn btn-info">Guardar Respuestas</button> -->
  	 </br>
  	 </div> 
  	</div> 

  		
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

													 '<td class="col-md-1	"><input type="text" name="asaniu"  id="asaniu" class="form-control" placeholder="ID Pregunta" readonly ></td>'+
														
														'<td><input type="text" name="nombre" id="nombre" class="form-control" placeholder=" Respuesta" > 	</td>'+
													
														 '<td><input type="number" name="valor"  id="valor" class="form-control" placeholder="Valor de la Respuesta" ></td>'+
 														
														
											"</tr>");
}

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

$(document).ready(function() {	
    $(document).on('click','#guardar', function (e) {
	    e.preventDefault();
	    var idr= []
	    var nombre = [];
	    var valor = [];
	    var pregunta = $('#pregunta_id').val();
		var _token= "{{ csrf_token() }}";
        var table = document.getElementById("detalle");
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   value = col.childNodes.item(0).value;

        		 
        		   if (j==0){

        			   idr.push(value);
        		   }
        		   if (j==1){

        			   nombre.push(value);
        		   }
        		   if (j==2){

        			   valor.push(value);
            		   }
        		  
        	   }  
        	   
        	}
        var data = {nombre:nombre,valor:valor,idr:idr,_token:_token,pregunta:pregunta};
      
        	$.ajax({
                method: 'post',
                url: '/guardarRespuesta',
                data:  data,
                async: true,
                dataType:"json",
                success: function(data){
                	
                	console.log(data);
                	
                	
//                 	window.location.replace("/paciente");
    				var ar=data.length;
    				var a = 0;
					for (a;a< ar; a++)
					{
						 var table = document.getElementById("detalle");
					        for (var i = 0, row; row = table.rows[i]; i++) {
					             
					        	   //iterate through rows
					        	   //rows would be accessed using the "row" variable assigned in the for loop
					        	   for (var j = 0, col; col = row.cells[j]; j++) {
					        		  	
					        		   valor= col.childNodes.item(0).value;

					        		   if (i==a){
					        			   
					        			   if (j==0){
					        				 
					        				   col.childNodes.item(0).value = data[a].id;
						            		   }
					        			  
					        		   }
					        		 
					        		  
					        	   }  
					        	   
					        	}
					}
					
				
					
// 					var id_preg=4;
					
					 
					
					 
//			     		  alert('You clicked row '+ ($(this).index()+1) );
    					alert ('Las respuestas se han guardado correctamente');
    				
					
//			     		});
					
                    
                	
                },
                error: function(data){
                	var errors = data.responseJSON;
//                     alert(errors);
                    console.log(data);
                    
                },
              
            });
        
        
    	
        
    });
});

</script>

@endsection