@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de Factura</h1>
    <h4><a href="{{ route('factura.index') }}">Listar Facturas</a></h4>
    <hr />
  </div>
    

  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/factura/{{ $facturas->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="id" id="id" value="{{ $facturas->id }}">
  		
  		<div class="form-group"> 
              <label>Paciente</label>
               
              <select  name="persona" id="persona" class="form-control selectpicker">
                <option value="" >Seleccionar Paciente</option>
                @foreach($personas as $persona)
            	<?php
                                 $selected = ""
                                
                             ?>
                    	@if ($persona->id == $facturas->paciente_id)
                        	 <?php
                                 $selected = "selected"
                             ?>
             			@endif
                
                  <option <?php echo ($selected) ?>   value="{{ $persona->id }}">{{ $persona->apellido }}, {{ $persona->nombre}} </option>
                @endforeach
              </select>
            
          	</div>
          		<div class="form-group"> 
              <label>Medico</label>
               
              <select  name="medico" id="medico" class="form-control selectpicker">
                <option value="" >Seleccionar Medico</option>
                @foreach($empleados as $medico)
                <?php
                                 $selected = ""
                                
                             ?>
                    	@if ($medico->id == $facturas->empleado_id)
                        	 <?php
                                 $selected = "selected"
                             ?>
             			@endif
                  <option <?php echo ($selected) ?>   value="{{ $medico->id }}">{{ $medico->apellido }}, {{ $medico->nombre}} </option>
                @endforeach
              </select>
          	</div>
          	
          	<div class="form-group"> 
              <label>Consulta</label>
               
              <select  name="consulta" id="consulta" class="form-control selectpicker">
                <option value="" >Seleccionar Consulta</option>
                 @foreach($consultas as $consulta)
                <?php
                                 $selected = ""
                                
                             ?>
                    	@if ($consulta->id == $facturas->consulta_id)
                        	 <?php
                                 $selected = "selected"
                             ?>
             			@endif 
                  <option <?php echo ($selected) ?>   value="{{ $consulta->id }}">{{ $consulta->fecha }} / {{ $consulta->apellido}}, {{ $consulta->nombre}} </option>
                @endforeach
              </select>
          	</div>
          	
          	<div class="form-group">
          			<label for="monto">Monto Total:</label>
          			<input type="number" name="monto" id="monto"  required value="{{ $facturas->monto_total }}" class="form-control" placeholder="Monto" > 	
          	</div>
          	<div class="form-group">
          			<label for="observacion">Observaciones:</label>
          			<input type="text" name="observacion" id="observacion"  value="{{ $facturas->observacion }}"  required class="form-control" placeholder="Observaciones" > 	
          		</div>
  		</div>
  
  		<div class="col-md-6">
  	
  	
  	
          	<div class="form-group"> 
              <label>Tipo de Factura</label>
              <select  name="tipo_pago" id="tipo_pago" value="{{ $facturas->tipo_pago }}"  class="form-control selectpicker">
                	<option value="" >Seleccionar Tipo de Factura</option>
                	
                      <option <?php if ($facturas->tipo_pago == "Contado") {echo ('selected');}  ?>    value="Contado">Contado </option>
                      <option <?php if ($facturas->tipo_pago == "Credito") {echo ('selected');}  ?>   value="Credito">Credito </option>
              </select>
              </div>
              
              <div class="form-group">
          			<label for="nro">Numero de Factura:</label>
          			<input type="text" name="nro" id="nro"  value="{{ $facturas->nro }}"class="form-control"  placeholder="Numero de Factura" > 	
          		</div>
         
               <div class="form-group">
          			<label for="fecha">Fecha de Factura:</label>
          			<input type="date" name="fecha" id="fecha" value="{{ $facturas->fecha }}" class="form-control"  > 	
          		</div>
              
          
          		
          		
          		<div class="form-group">
          			<label for="timbrado">Timbrado:</label>
          			<input type="text" name="timbrado" id="timbrado" class="form-control" placeholder="Numero de Timbrado" value="{{ $facturas->timbrado }}"> 	
          		</div>
          		<div class="form-group">
          			<label for="vigencia_timbrado">Fecha Validez Timbrado:</label>
          			<input type="date" name="vigencia_timbrado" id="vigencia_timbrado" class="form-control"  value="{{ $facturas->vigencia_timbrado }}"> 	
          		</div>
  			</div>
  		<input type="text" name="estado" value="Abierto" hidden> 	
  		<div class="col-md-12">
  		<table id="tabla" name="tabla" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>Concepto</th>
	  					<th>Cantidad</th>
	  					<th>Impuesto</th>
	  					<th>Precio Unitario </th>
	  					<th>Precio Total</th>
	  				</tr>
	  			</thead>
	  			<tbody id="detalle"  class="detalle" name="detalle">
	  			<tr>
	  				@foreach($factura_detalle as $det)
	  				<tr>
                <?php
                                 $selected = ""
                                
                             ?>
                    	@if ($consulta->id == $facturas->consulta_id)
                        	 <?php
                                 $selected = "selected"
                             ?>
             			@endif 
                  <td><select  name='factura_concepto' id='factura_concepto' class='form-control selectpicker'>
    											               <option value='' >Seleccionar Concepto</option>
    											                @foreach($factura_conceptos as $factura_concepto)
    											                <?php
                                                                                 $selected = ""
                                                                                
                                                                             ?>
                                                                    	@if ($factura_concepto->id == $det->factura_concepto_id)
                                                                        	 <?php
                                                                                 $selected = "selected"
                                                                             ?>
                                                                         @endif 
    											                  <option  <?php echo ($selected) ?>  value='{{ $factura_concepto->id }}'>{{ $factura_concepto->descripcion }} </option>
    											                @endforeach
    											              </select>
											          			
											          		</td>
														<td><input type="number" name="cantidad" id="cantidad" class="form-control" value='{{ $det->cantidad }}' placeholder="Cantidad" > 	</td>
														<td><select  name="impuesto" id="impuesto" class="form-control selectpicker>
										                <option value="" >Seleccionar Impuesto</option>
										               @foreach($impuestos as $impuesto)
										                <?php
                                                                                 $selected = ""
                                                                                
                                                                             ?>
                                                                    	@if ($impuesto->id == $det->impuesto_id)
                                                                        	 <?php
                                                                                 $selected = "selected"
                                                                             ?>
                                                                         @endif 
										                  <option <?php echo ($selected) ?>   value="{{ $impuesto->id }}">{{ $impuesto->nombre }} </option>
										                @endforeach
										              </select></td>
										             
                                                                        	 <?php
                                                                                 $unitario = $det->monto / $det->cantidad;
                                                                                 
                                                                             ?>
                                                                         
														<td><input type="number" name="precio_unitario"  id="precio_unitario" value=<?php echo ($unitario) ?>  class="form-control" placeholder="Precio unitario" ></td>
														 <td><input type="number" name="monto_detalle"  id="monto_detalle" value='{{ $det->monto }}'  class="form-control" placeholder="Precio Total" ></td>
						</tr>
                @endforeach
				
			</tr>					          		
	  		</tbody>
  			</table>
    <button type="button" name="agregar" id="agregar" class="btn btn-success">Agregar Fila</button>  <button type="button" name="borrar_fila" id="borrar_fila" class="btn btn-danger">Borrar Uiltima Fila</button>
  	</div>
  	</div>
  	 </br>

<!--       <div class="form-group"> -->
<!--       <div class="checkbox"> -->
<!--         <label><input id="profesional_salud" type="checkbox" name="profesional_salud" value="1">Es profesional de la salud?</label> -->
<!--       </div> -->
<!--       </div> -->

  		<button type="button" name="guardar" id="guardar" class="btn btn-info">Guardar</button>
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

        		   if (valor==''){
   					return alert('Debe completar todos los datos del detalle de la factura')
            		   }

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

    	if (consulta =='' || persona =='' || medico =='' || monto =='' || tipo_pago =='' || nro =='' || fecha =='' || timbrado =='' || vigencia_timbrado == ''  ){
			return alert ('Debe completar todos los datos en la cabecera de la factura');

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

@endsection