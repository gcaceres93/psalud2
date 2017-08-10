@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de test</h1>
    <h4><a href="{{ route('test.index') }}">Listar Tests</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/test/{{ $test->id }}">
  	<input type="hidden"  name="ids" id="ids" class="form-control" placeholder="Ids del test" value="{{$test->id}}">	
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del test" value="{{ $test->nombre }}">		
      <br/>
      <div class="form-group">
              @php
              		$var='';
              		if ($test->abstracto == True)
              			{
              				$var='checked';
              			}
              @endphp
  			<label for="abstracto"> &iquest Es abstracto?</label>
  			<input type="checkbox" @php echo($var) @endphp name="abstracto" id="abstracto"   value="{{ $test->abstracto }}">		
      <br/>
   </div>   
      
  	
  	</form>	
  	</div>
    </div>
     <div class="form-group">
      <div class="col-md-12	">
      <label for="preguntas">Preguntas Test</label>
  	 <table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  		
  				<thead>
	  				<tr class="table table-info">
	  				<th>ID Pregunta </th>
	  					<th>Titulo  de la Pregunta</th>
	  					<th>Descripcion de la Pregunta</th>
	  					<th>Respuesta</th>
	  					
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
	  			@if($preguntas)
	  			@foreach ($preguntas as $pregu)
	  				<tr>

													 <td class="col-md-1	"><input type="text" name="asaniu"  id="asaniu" class="form-control" placeholder="ID Pregunta" readonly value="{{$pregu->id}}" ></td>
														
														<td  class="col-md-4"><input type="text" name="pregunta" id="pregunta" class="form-control" placeholder=" Titulo Pregunta" value="{{$pregu->nombre}}" > 	</td>
													
														 <td  class="col-md-6	"><input type="text" name="decripcion"  id="descripcion" class="form-control" placeholder="Descripcion Pregunta" value="{{$pregu->descripcion}}" ></td>											
														
 														 <td  class="col-md-2	"> <center> <button type="button" name="respuesta" class="btn btn-warning"    id="respuesta" class="form-control"> Cargar Respuestas <center> </td>
 														
														
					</tr>
				@endforeach
				@endif
	  		</tbody>
  			</table>
    <button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button>
  	</div>
  	
  	<div class="col-md-12	">
  	</br></br>
      	<label for="preguntas">Resultado Test </label>
      	 <table id="tablar" name="tablar" class="table table-hover table-bordered table-condensed">
      		
      				<thead>
    	  				<tr class="table table-info">
    	  				<th class="col-md-1">ID</th>
    	  					<th class="col-md-6">Descripcion</th>
    	  					<th class="col-md-1">Valor Desde</th>
    	  					<th class="col-md-1">Valor Hasta</th>
    	  					
    	  				</tr>
    	  			</thead>
    	  			<tbody id="detaller"   name="detaller">
    	  				@if($resultado)
            	  			@foreach ($resultado as $resul)
            	  				<tr>
            						<td ><input type="number" name="idres"  id="idres" class="form-control"  placeholder="ID res." readonly value="{{$resul->id}}"  > </td>
                					 <td><input type="text" name="resultado" id="resultado" class="form-control" placeholder=" Descripcion" value="{{$resul->nombre}}" > 	</td>    				
                					 <td><input type="number" min="0" name="valor_ini"  id="valor_ini" class="form-control"  value="{{$resul->valor_ini}}" ></td>
                					 <td><input type="number" min="1" name="valor_fin"  id="valor_fin" class="form-control" value="{{$resul->valor_fin}}"  ></td>
             														
            														
            					</tr>
            				@endforeach
						@endif
    											          		
    	  		</tbody>
      			</table>
        <button type="button" name="agregarr" id="agregarr" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_filar" id="borrar_filar" class="btn btn-danger">Borrar Uiltima Fila</button>
  	</br></br>
  	 <button type="button" id="guardar" name="guardar" class="btn btn-info">Guardar Test</button>
  	 </br>
  	 </div> 
  	</div> 
  </div>


<script type="text/javascript">
$(document).ready(function() {	
    $('#agregar').on('click', function () {
    	agregarfila();
        
    });
});

$(document).ready(function() {	
    $('#agregarr').on('click', function () {
    	$('#detaller').append("<tr> "+

    			 '<td ><input type="number" name="idres"  id="idres" class="form-control"  placeholder="ID res." readonly  > </td>'+
					
					'<td><input type="text" name="resultado" id="resultado" class="form-control" placeholder=" Descripcion" > 	</td>'+
				
				
					 '<td><input type="number" min="0" name="valor_ini"  id="valor_ini" class="form-control"  ></td>'+
					 '<td><input type="number" min="1" name="valor_fin"  id="valor_fin" class="form-control"  ></td>'+

					
						
					
					
		"</tr>");
        
    });
});

function agregarfila(){

	$('#detalle').append("<tr> "+

													 '<td class="col-md-1	"><input type="text" name="asaniu"  id="asaniu" class="form-control" placeholder="ID Pregunta" readonly ></td>'+
														
														'<td><input type="text" name="pregunta" id="pregunta" class="form-control" placeholder=" Titulo Pregunta" > 	</td>'+
													
													
														 '<td><input type="text" name="decripcion"  id="descripcion" class="form-control" placeholder="Descripcion Pregunta" ></td>'+

														
															
														
 														 '<td> <center> <button type="button" name="respuesta" class="btn btn-warning"    id="respuesta" class="form-control"> Cargar Respuestas <center> </td>'+
 														
														
											"</tr>");
}

$(document).ready(function() {	
    $('#borrar_fila').on('click', function () {
    	borrarfila('detalle');
    });
    	 $('#borrar_filar').on('click', function () {
    	    	borrarfila('detaller');
    	
    	
    	
        
    });
});

function borrarfila(tableID){
	var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
            table.deleteRow(rowCount-1);
          
           
// 	$('#detalle').prepend();

}

// $(document).ready(function() {	
//     $(document).on('click','#respuesta', function () {
//     	 var table = document.getElementById("detalle");
//     	var fila = $(this).closest('tr').index();
// 		 var id_preg = table.rows[fila].cells[1].childNodes.item(0).value;
// 		 alert(id_preg);
        
//     });
// });


$(document).ready(function() {	
    $(document).on('click','#respuesta', function (e) {
	    e.preventDefault();
		var fila = $(this).closest('tr').index();
	    var pregunta = [];
	    var idp = [];
		var descripcion=[];
		var resultado=[];
		var val_min=[];
		var val_max = [];
		var idre = [];
		var ids=  $('#ids').val(); 
		var nombre=  $('#nombre').val();
		if ($('#abstracto').prop('checked') ){
			var abstracto=  "True" ;}
			else	{ 	var abstracto=  "False"; }
		var _token= "{{ csrf_token() }}";
        var table = document.getElementById("detalle");
        var tabler = document.getElementById("detaller");
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).value;

        		   if (j==0){

        			   idp.push(valor);
        		   }

        		   if (j==1){
        			   if (valor==''){
							return alert('El campo titulo de pregunta no puede quedar vacio');
						}
        			   pregunta.push(valor);
        		   }
        		   if (j==2){

        			   descripcion.push(valor);
            		   }
        		  
        	   }  
        	   
        	}
    //  Iterar la tabla de respuestas
    	var	valor_min=0;
        var     valor_max=1;
        for (var i = 0, row; row = tabler.rows[i]; i++) {
            
     	   //iterate through rows
     	   //rows would be accessed using the "row" variable assigned in the for loop
     	   for (var j = 0, col; col = row.cells[j]; j++) {
     		  	
     		   valor= col.childNodes.item(0).value;

			
     		   
     		  if (j==0){

     			  idre.push(valor);
     		   }else{
     			  if (valor==''  && abstracto=='False'){
  					return alert('Debe completar todos los datos de los posibles resultados! Si el test es abstracto y no tiene resultados medibles en rango de valores debe seleccionar el campo de abstracto');
  				}
     		   }

     		   if (j==1){

     			  resultado.push(valor);
     		   }

     		  if (j==2){
     			  if (i>0){
						if (valor_max>valor){
							return alert ('El valor minimo debe ser mayor al  valor maximo anterior');
							}
           		   }
     			  val_min.push(valor);
     			 valor_min=valor;
     		   }
     		 if (j==3){

    			  if (valor_min >= valor){
									return alert('El valor maximo no puede ser menor que el valor minimo para este resultado');
						}
			  val_max.push(valor);
			  valor_max=valor;
		   }
     		  
     	   }  
     	   
     	}
        var data = {nombre:nombre,abstracto:abstracto,pregunta:pregunta,descripcion:descripcion,_token:_token,ids:ids,idp:idp,resultado:resultado,val_min:val_min,val_max:val_max,idre:idre};
        desea = confirm('Para cargar respuestas a esta pregunta, primero se debe guardar el Test con sus respectivas preguntas,  Desea guardar el test ahora  ?');
        if (desea == 1){
        	if (nombre == '' ){
				return alert ('Debe cargar el nombre del test')
			}
        	$.ajax({
                method: 'post',
                url: '/guardarPregunta',
                data:  data,
                async: true,
                dataType:"json",
                success: function(data){
                	
                	console.log(data);
                	var ids = document.getElementById('ids');
                    ids.value = data[0].test_id;
                   
                	
//                 	window.location.replace("/paciente");
    				var ar=data.length;
    				var a = 0;
    				var preg=0;
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
					        				 	if (preg!=data[a].id){ 
					        				   col.childNodes.item(0).value = data[a].id;
					        				   preg=data[a].id }
						            		   }
					        			  
					        		   }
					        		 
					        		  
					        	   }  
					        	   
					        	}
					}
					
				
					
// 					var id_preg=4;
					
					 
					 var id_preg = table.rows[fila].cells[0].childNodes.item(0).value;
					 
//			     		  alert('You clicked row '+ ($(this).index()+1) );
    					alert ('Se abrira a la pantalla de carga de respuestas, para poder visualizarla habilite los popups')
    					window.open("/respuestaPregunta/"+id_preg+"/edit");
					
//			     		});
					
                    
                	
                },
                error: function(data){
                	var errors = data.responseJSON;
//                     alert(errors);
                    console.log(data);
                    
                },
              
            });
        } else{
			
        }   
        
    	
        
    });
});

$(document).ready(function() {	
    $(document).on('click','#guardar', function (e) {
	    e.preventDefault();
		var fila = $(this).closest('tr').index();
	    var pregunta = [];
	    var idp = [];
		var descripcion=[];
		var resultado=[];
		var idre = [] ;
		var val_min=[];
		var val_max = [];
		var ids=  $('#ids').val();
		var nombre=  $('#nombre').val();
		if ($('#abstracto').prop('checked') ){
			var abstracto =  "True" }
			else	{ 	var abstracto =  "False"  }
		var _token= "{{ csrf_token() }}";
        var table = document.getElementById("detalle");
        var tabler = document.getElementById("detaller");

        if (table.rows.length == 0){
			return alert('Debe cargar por lo menos una pregunta');
        }
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).value;

        		   if (j==0){

        			   idp.push(valor);
        		   }

        		   if (j==1){
						if (valor==''){
							return alert('El campo pregunta no puede quedar vacio');
						}
       			   pregunta.push(valor);
       		   }
       		   if (j==2){

       			   descripcion.push(valor);
           		   }
        		  
        	   }  
        	   
        	}
        //  Iterar la tabla de respuestas
        var	valor_min=0;
        var     valor_max=1;
        if (tabler.rows.length == 0  && abstracto=='False'){
            return alert('Si el test es abstracto y no tiene resultados medibles en rango de valores debe seleccionar el campo de abstracto');}
            for (var i = 0, row; row = tabler.rows[i]; i++) {
                
         	   //iterate through rows
         	   //rows would be accessed using the "row" variable assigned in the for loop
         	   for (var j = 0, col; col = row.cells[j]; j++) {
         		  	
         		   valor= col.childNodes.item(0).value;

         		  if (j==0){
         			    
         			  idre.push(valor);
         			 
         		   }else{

              		  if (valor==''  && abstracto=='False'){
         					return alert('Debe completar todos los datos de los posibles resultados! Si el test es abstracto y no tiene resultados medibles en rango de valores debe seleccionar el campo de abstracto');
         				}
         			}
    
         		   if (j==1){
    
         			  resultado.push(valor);
         		   }
    
         		  if (j==2){
            		   if (i>0){
   						if (valor_max >=valor){
   							return alert ('El valor minimo debe ser mayor al  valor maximo anterior');
   							}
                		   }

        			  val_min.push(valor);
        			  valor_min=valor;
        		   }
         		 if (j==3){
 					if (valor_min >= valor){
 						return alert('El valor maximo no puede ser menor o igual que el valor minimo para este resultado');
 						}
      			  val_max.push(valor);
      			  valor_max=valor;
          		   }
         		  
         	   }  
         	   
         	}
         	
        var data = {nombre:nombre,abstracto:abstracto,pregunta:pregunta,descripcion:descripcion,_token:_token,ids:ids,idp:idp,resultado:resultado,val_min:val_min,val_max:val_max,idre:idre};
        if (nombre == '' ){
			return alert ('Debe cargar el nombre del test')
		}
        	$.ajax({
                method: 'post',
                url: '/guardarPregunta',
                data:  data,
                async: true,
                dataType:"json",
                success: function(data){
                	
                	
                	var ids = document.getElementById('ids');
                    ids.value = data[0].test_id;
                	
                	
//                 	window.location.replace("/paciente");
    				var ar=data.length;
    				var a = 0;
    				var preg=0;
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
					        				 	if (preg!=data[a].id){ 
					        				   col.childNodes.item(0).value = data[a].id;
					        				   preg=data[a].id }
						            		   }
					        			  
					        		   }
					        		 
					        		  
					        	   }  
					        	   
					        	}
					}
					
					
				
					
// 					var id_preg=4;
					
					 //console.log(data);
					window.location.replace("/test");
					
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