<link rel="stylesheet" href="{{ URL::asset('laravel/bootstrap-3.3.7-dist/css/bootstrap.css') }}"/>
<style type="text/css">
    
    
    @media print {
  /* style sheet for print goes here */
  .hide-from-printer{  display:none; }
}
    
</style> 



<div class="container">
  <div class="row">
    
  </div>
    <div class="container">
    <div class="well">
    	<div class="row">
    		<div class="col-md-6">
               
    			<address>
			        <strong>Welfare S.A. <br> Consultorio Psicologico</strong><br>
			        EEUU 1341 entre Milano y Lugano<br>
			        (021)370-389<br>
		    	</address>
    		</div>
    		<div class="col-md-6" >
    			<table >
    				<tbody>
    					<tr>
    						<td ><strong>Timbrado Nro. </strong></td>
    						<td>{{ $facturas->timbrado }}</td>
    					</tr>
    					<tr>
    					<td > </td>
    						<td> </td>
    					</tr>
    					<tr>
    						<td ><strong>Fecha Validez Timbrado.</strong></td>
    						<td>{{ $facturas->vigencia_timbrado }}</td>
    					</tr>
    					<tr>
    						<td ><strong>Numero de Factura</strong></td>
    						<td>{{ $facturas->nro }}</td>
    					</tr>
    					
    				</tbody>
    			</table>
    		</div>
    	</div>
    	</div>
<!--     	<div class="row"> -->
<!--     		<div class="span8"> -->
<!--     			<h2>Invoice</h2> -->
<!--     		</div> -->
<!--     	</div> -->
<!--     	<div class="row"> -->
<!-- 		  	<div class="span8 well invoice-body"> -->
<!-- 		  		<table class="table table-bordered"> -->
<!-- 					<thead> -->
<!-- 						<tr> -->
<!-- 							<th>Description</th> -->
<!-- 							<th>Date</th> -->
<!-- 							<th>Amount</th> -->
<!-- 						</tr> -->
<!-- 					</thead> -->
<!-- 					<tbody> -->
<!-- 					<tr> -->
<!-- 						<td>Service request</td> -->
<!-- 						<td>10/8/2013</td> -->
<!-- 						<td>$1000.00</td> -->
<!-- 						</tr><tr> -->
<!-- 							<td>&nbsp;</td> -->
<!-- 							<td><strong>Total</strong></td> -->
<!-- 							<td><strong>$1000.00</strong></td> -->
<!-- 						</tr> -->
<!-- 					</tbody> -->
<!-- 				</table> -->
<!-- 		  	</div> -->
<!--   		</div> -->
<!--   		<div class="row"> -->
<!--   			<div class="span8 well invoice-thank"> -->
  		
<!--   			</div> -->
<!--   		</div> -->
<!--   		<div class="row"> -->
<!--   	    	<div class="span3"> -->
<!--   		        <strong>Phone:</strong> <a href="tel:555-555-5555">555-555-5555</a> -->
<!--   	    	</div> -->
<!--   	    	<div class="span3"> -->
<!--   		        <strong>Email:</strong> <a href="mailto:hello@5marks.co">hello@bootply.com</a> -->
<!--   	    	</div> -->
<!--   	    	<div class="span3"> -->
<!--   		        <strong>Website:</strong> <a href="http://5marks.co">http://bootply.com</a> -->
<!--   	    	</div> -->
<!--   		</div> -->
<!--     </div> -->

  <div class="row">
    
  	<form method="post" action="/factura/{{ $facturas->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="id" id="id" value="{{ $facturas->id }}">
  		
  		<div class="col-md-6">
  		<div class="form-group">
          			<label for="fecha">Fecha de Factura:</label> {{ $facturas->fecha }} 
<!--           			<input type="date" name="fecha" id="fecha" disabled value="{{ $facturas->fecha }}" class="form-control"  > 	 -->
          		</div>
          		</div>
          <div class="col-md-6">
  		<div class="form-group">
          			<label for="tipo">Tipo de Factura:</label> <?php if ($facturas->tipo_pago == "Contado") {echo ('Contado');}else{ echo('Credito');}  ?>                
          			 
          		</div>
          		</div>
          <div class="col-md-12">
          		<div class="form-group"> 
              <label>Nombre o Razon Social:</label>
              @foreach($personas as $persona)
            	
                    	@if ($persona->id == $facturas->paciente_id)
                        	 <?php
                                 echo  ($persona->razon_social);
                             ?>
             			@endif
             @endforeach
               
             
            
          	</div>
          	<div class="form-group"> 
              <label>RUC:</label>
              @foreach($personas as $persona)
            	
                    	@if ($persona->id == $facturas->paciente_id)
                        	 <?php
                                 echo  ($persona->ruc);
                             ?>
             			@endif
             @endforeach
               
             
            
          	</div>
          		
  		</div>
  
  		
  		<div class="col-md-12">
  		<table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>Concepto</th>
	  					<th>Cantidad</th>
	  					<th>Impuesto</th>
	  					<th>Precio Unitario </th>
	  					<th>IVA</th>
	  					<th>Precio Total </th>
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
	  			<tr>
	  			@php $iva_total10=0; $iva_total5=0; $monto_total=0; @endphp
	  				@foreach($factura_detalle as $det)
	  				<tr>
                	
             			
             			
                  <td>
    											               
    											                @foreach($factura_conceptos as $factura_concepto)
    											                <?php
                                                                                 $selected = ""
                                                                                
                                                                             ?>
                                                                    	@if ($factura_concepto->id == $det->factura_concepto_id)
                                                                        	 
                                                                        	 <input type="text" disabled name="factura_concepto"  id="factura_concepto" value="{{ $factura_concepto->descripcion }}"  class="form-control" >
                                                                             
                                                                         @endif 
    											                 
    											                @endforeach
    											              
											          			
											          		</td>
														<td><input type="number" disabled name="cantidad" id="cantidad" class="form-control" value='{{ $det->cantidad }}' placeholder="Cantidad" > 	</td>
														<td> 
										              
										               @foreach($impuestos as $impuesto)
										                <?php
                                                                                 $selected = ""
                                                                                
                                                                             ?>
                                                                    	@if ($impuesto->id == $det->impuesto_id)
                                                                        	
                                                                        	 <input type="text" disabled name="impuesto"  id="impuesto" value="{{ $impuesto->nombre }}"  class="form-control" >
                                                                            
                                                                         @endif 
										                  
										                @endforeach
										              </select></td>
										             
                                                                        	 <?php
                                                                                 $unitario = $det->monto / $det->cantidad;
                                                                                 if  ($det->porcentaje==5){
                                                                                      $iva_total5=$det->iva;
                                                                                 }else {
                                                                                 $iva_total10 = $iva_total10 + $det->iva;
                                                                                 }
                                                                                 $monto_total=$monto_total + $det->monto;
                                                                                 
                                                                             ?>
                                                                         
														<td><input type="number" disabled name="precio_unitario"  id="precio_unitario" value=<?php echo ($unitario) ?>  class="form-control" placeholder="Precio unitario" ></td>
														 <td><input type="text" disabled name="iva"  id="iva" value='{{ $det->iva }}'  class="form-control" placeholder="Precio Total" ></td>
														 <td><input type="number" disabled name="monto_detalle"  id="monto_detalle" value='{{ $det->monto }}'  class="form-control" placeholder="Precio Total" ></td>
														
						</tr>
                @endforeach
                
				
			</tr>					          		
	  		</tbody>
  			</table>
  			
  			
<!--     <button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button> -->
  	</div>
  	<div class="col-md-3">
  	<label for="totales">Totales</label> </div>
  	<div class="col-md-3"> <label for="iva4"> Total IVA 5: </label>
  	 <?php echo ($iva_total5) ?></div>
  	 <div class="col-md-3"> <label for="iva9"> Total IVA 10: </label>
  	 <?php echo ($iva_total10) ?></div>
  	 <div class="col-md-3">  <label for="totalis"> Total Factura: </label>
  	 <?php echo ($monto_total) ?></div>
  	
  	
  	
  	
  	 	</div>
  	 </br>
  	 <button type="button" class="hide-from-printer"  value="Print" onClick="window.print()">Imprimir Factura</button>

<!--       <div class="form-group"> -->
<!--       <div class="checkbox"> -->
<!--         <label><input id="profesional_salud" type="checkbox" name="profesional_salud" value="1">Es profesional de la salud?</label> -->
<!--       </div> -->
<!--       </div> -->

<!--   		<button type="button" name="guardar" id="guardar" class="btn btn-info">Guardar</button> -->
  	</form>	
    
</div>

<script type="text/javascript">
$(document).ready(function() {	
    $('#agregar').on('click', function () {
    	agregarfila();
        
    });

    $(document).on('change','#precio_unitario', function () {
		asignartotal();
		total();
    });
    $(document).on('change','#cantidad', function () {	
    asignartotal();
    total();
    
    });
    
});
function asignartotal(){
	var table = document.getElementById("detalle");
for (var i = 0, row; row = table.rows[i]; i++) {
     
	   //iterate through rows
	   //rows would be accessed using the "row" variable assigned in the for loop
	   for (var j = 0, col; col = row.cells[j]; j++) {
		  	
		   valor= col.childNodes.item(0).value;

			if (j==1)
			{
				cant=valor;
			}

			 if (j==3){
				 
				 pu=valor;
        		   }
			   
			   if (j==4){
				 
				   col.childNodes.item(0).value = pu*cant;
        		   }
			  
		   
		 
		  
	   }  
	   
	}

}
function total(){
	var monto = 0;
    var table = document.getElementById("detalle");
    for (var i = 0, row; row = table.rows[i]; i++) {
         
    	   //iterate through rows
    	   //rows would be accessed using the "row" variable assigned in the for loop
    	   for (var j = 0, col; col = row.cells[j]; j++) {
    		  	if (j==4){
    		   monto = Number(monto) + Number( col.childNodes.item(0).value);
    		   
    		  	}
    	   }  
    	}

	  $('#monto').val(monto);
	
}

// $('#timbrado').on('click', function() {
//     $("#tr.detalle").each(function() {
//         var quantity1 = $(this).find("input.name").val(),
//             quantity2 = $(this).find("input.id").val();
//         console.log(quantity1);
//         console.log(quantity2);
//     });
// });
$(document).ready(function() {	
    $('#guardar').on('click', function () {
		var monto;
		var concepto = [];
		var cantidad=[];
		var impuesto=[];
		var monto_total=[];
		var persona=  $('#persona').val();
		var consulta=  $('#consulta').val();
		var id=  $('#id').val();
		var medico=  $('#medico').val();
		var monto=  $('#monto').val();
		var observacion=  $('#observacion').val();
		var tipo_pago=  $('#tipo_pago').val();
		var nro=  $('#nro').val();
		var fecha=  $('#fecha').val();
		var timbrado=  $('#timbrado').val();
		var estado=  $('#estado').val();
		var vigencia_timbrado=  $('#vigencia_timbrado').val();
        var table = document.getElementById("detalle");
        for (var i = 0, row; row = table.rows[i]; i++) {
             
        	   //iterate through rows
        	   //rows would be accessed using the "row" variable assigned in the for loop
        	   for (var j = 0, col; col = row.cells[j]; j++) {
        		  	
        		   valor= col.childNodes.item(0).value;
        		   nombre= col.childNodes.item(0).name;

        		   if (j==0){

        			   concepto.push(valor);
        		   }
        		   if (j==1){

        			   cantidad.push(valor);
            		   }
        		   if (j==2){

        			   impuesto.push(valor);
            		   }
        		   if (j==4){

        			   monto_total.push(valor);
            		   }
 					
        	   }  
        	   
        	}
        var data = {id:id,consulta:consulta,concepto:concepto,cantidad:cantidad,impuesto:impuesto,monto_total:monto_total,persona:persona,medico:medico,monto:monto,observacion:observacion,tipo_pago:tipo_pago,nro:nro,fecha:fecha,timbrado:timbrado,estado:estado,vigencia_timbrado:vigencia_timbrado};

        $.ajax({
            method: 'get',
            url: '/tablaDinamicaupdate',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
//             	console.log(data);
           	window.location.replace("/factura");
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                 alert('Se ha encontrado un error en la carga. Verifique Datos');
//                 console.log(data);
                
            },
          
        });
    	
        
    });
});



function recorrerTabla(value,index,ar){
	console.log(value);
	
}

$(document).ready(function() {	
    $('#borrar_fila').on('click', function () {
    	borrarfila('detalle');
        
    });
});


$(document).ready(function() {	
	 $(document).on('change','#monto_detalle', function () {
//      	  $('#monto').val($('#monto_detalle').val())
//     var table = document.getElementById("detalle");
    var monto = 0;
    var table = document.getElementById("detalle");
    for (var i = 0, row; row = table.rows[i]; i++) {
         
    	   //iterate through rows
    	   //rows would be accessed using the "row" variable assigned in the for loop
    	   for (var j = 0, col; col = row.cells[j]; j++) {
    		  	if (j==4){
    		   monto = Number(monto) + Number( col.childNodes.item(0).value);
    		   
    		  	}
    	   }  
    	}

	  $('#monto').val(monto);
        
    });
});

$(document).ready(function() {	
	$(document).on('change','#medico', function () {
    	var medico = $('#medico').val();
        
        var data = {medico:medico};
        $.ajax({
            method: 'get',
            url: '/verificarConsulta',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
            	$('#consulta').html('	');
            	$('#consulta').append(' <option  </option>'); 
			 data.forEach(recorrerdata);
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert(errors);
            },

        });
        
    });
});

$(document).ready(function() {	
	$('#cobrar').on('click', function () {

    	var tipo_pago = $('#tipo_pago').val();
    	var monto = $('#monto_a_cobrar').val();
    	var id = $('#id').val();
    	var observacion = $('#observacion_cobro').val();
        
        var data = {tipo_pago:tipo_pago,monto:monto,observacion:observacion,id:id};
        
        $.ajax({
            method: 'get',
            url: '/cobrar',
            data:  data ,
            async: true,
            dataType:"json",
            success: function(data){
            	alert('aaa');

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
//                 alert(errors);
					alert('asd');
            },

        });
        
    });
});

$(document).ready(function() {	
    $('#consulta').on('change', function () {
    	var consulta = $('#consulta').val();
        
        var data = {consulta:consulta};
        $.ajax({
            method: 'get',
            url: '/traerConsulta',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
//             	$('#consulta').html('	');
// 			 data.forEach(recorrerdata);
				borrarfila('detalle');
				agregarfila();
// 				$('#factura_concepto').value(1);
				 data.forEach(recorrerconsulta);
				
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert(errors);
            },

        });
        
    });
});

function recorrerconsulta(value,index,ar){
	$('#factura_concepto').val(1);
	$('#cantidad').val(value.cantidad_horas);
	$('#precio_unitario').val(value.tarifa);
	var total = value.cantidad_horas * value.tarifa;
	$('#monto_detalle').val(total);

	var monto = 0;
    var table = document.getElementById("detalle");
    for (var i = 0, row; row = table.rows[i]; i++) {
         
    	   //iterate through rows
    	   //rows would be accessed using the "row" variable assigned in the for loop
    	   for (var j = 0, col; col = row.cells[j]; j++) {
    		  	if (j==4){
    		   monto = Number(monto) + Number( col.childNodes.item(0).value);
    		   
    		  	}
    	   }  
    	}

	  $('#monto').val(monto);
	
}



function agregarfila(){
	$('#detalle').append("<tr> "+
														"<td>"+
    														
    											               
    											              "<select  name='factura_concepto' id='factura_concepto' class='form-control selectpicker'>"+
    											               " <option value='' >Seleccionar Concepto</option>"+
    											                "@foreach($factura_conceptos as $factura_concepto)"+
    											                  "<option   value='{{ $factura_concepto->id }}'>{{ $factura_concepto->descripcion }} </option>"+
    											                "@endforeach"+
    											              "</select>"+
											          			
											          		" </td>" +
														'<td><input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad" > 	</td>'+
														'<td><select  name="impuesto" id="impuesto" class="form-control selectpicker>'+
										                '<option value="" >Seleccionar Impuesto</option>'+
										               '@foreach($impuestos as $impuesto)'+
										                '  <option   value="{{ $impuesto->id }}">{{ $impuesto->nombre }} </option>'+
										                '@endforeach'+
										              '</select></td>'+
														 '<td><input type="number" name="precio_unitario"  id="precio_unitario" class="form-control" placeholder="Precio unitario" ></td>'+
														 '<td><input type="number" name="monto_detalle"  id="monto_detalle" class="form-control" placeholder="Precio Total" ></td>'+
											"</tr>");
}
function borrarfila(tableID){
	var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
            table.deleteRow(rowCount-1);
	
// 	$('#detalle').prepend();

}
function recorrerdata(value,index,ar){
	
	$('#consulta').append(' <option   value='+value.id+'>'+value.fecha+' '+value.apellido+', '+value.nombre+'</option>'); 
}
</script>

