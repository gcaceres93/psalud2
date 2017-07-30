@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Facturas</h1>
    <h4><a href="{{ route('factura.index') }}">Listar Facturas</a></h4>
    <hr />
  </div>
 <div id="Facturas" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        	<a  href="#Factura" data-toggle="tab">Factura</a>
			</li>
			<li><a href="#Cobro" data-toggle="tab">Cobro</a>
			</li>
			
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="Factura">
  <div class="row">
    <div class="col-md-6">
          	<form method="post" action="/factura">
          		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        		<div class="form-group"> 
              <label>Paciente</label>
               
              <select  name="persona" id="persona" class="form-control selectpicker">
                <option value="" >Seleccionar Paciente</option>
                @foreach($personas as $persona)
                  <option   value="{{ $persona->id }}">{{ $persona->apellido }}, {{ $persona->nombre}} </option>
                @endforeach
              </select>
            
          	</div>
          		<div class="form-group"> 
              <label>Medico</label>
               
              <select  name="medico" id="medico" class="form-control selectpicker">
                <option value="" >Seleccionar Medico</option>
                @foreach($empleados as $medico)
                  <option   value="{{ $medico->id }}">{{ $medico->apellido }}, {{ $medico->nombre}} </option>
                @endforeach
              </select>
          	</div>
          	
          	<div class="form-group"> 
              <label>Consulta</label>
               
              <select  name="consulta" id="consulta" class="form-control selectpicker">
                <option value="" >Seleccionar Consulta</option>
              </select>
          	</div>
          	
          	<div class="form-group">
          			<label for="nro">Monto Total:</label>
          			<input type="number" name="monto" class="form-control" placeholder="Monto" > 	
          	</div>
          	<div class="form-group">
          			<label for="observacion">Observaciones:</label>
          			<input type="text" name="observacion" required class="form-control" placeholder="Observaciones" > 	
          		</div>
  		</div>
  
  		<div class="col-md-6">
  	
  	
  	
          	<div class="form-group"> 
              <label>Tipo de Factura</label>
              <select  name="tipo_pago" id="tipo_pago" class="form-control selectpicker">
                	<option value="" >Seleccionar Tipo de Factura</option>
                      <option   value="Contado">Contado </option>
                      <option   value="Credito">Credito </option>
              </select>
              </div>
              
              <div class="form-group">
          			<label for="nro">Numero de Factura:</label>
          			<input type="text" name="nro" class="form-control" placeholder="Numero de Factura" value="{{ $nro_factura }}"> 	
          		</div>
         
               <div class="form-group">
          			<label for="fecha">Fecha de Factura:</label>
          			<input type="date" name="fecha" class="form-control"  > 	
          		</div>
              
          
          		
          		
          		<div class="form-group">
          			<label for="nro">Timbrado:</label>
          			<input type="text" name="timbrado" class="form-control" placeholder="Numero de Timbrado" value="{{ $factura->timbrado }}"> 	
          		</div>
          		<div class="form-group">
          			<label for="fecha_timbrado">Fecha Validez Timbrado:</label>
          			<input type="date" name="vigencia_timbrado" class="form-control"  value="{{ $factura->vigencia_timbrado }}"> 	
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
	  					<th>Precio Total</th>
	  				</tr>
	  			</thead>
	  			<tbody id="detalle">
	  				
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

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
    <div class="tab-pane" id="Cobro">
          
          	<div class="form-group">
          			<label for="tipo_pago">Tipo de Pago:</label>
          			<select  name="tipo_pago" id="tipo_pago"  class="form-control selectpicker">
                	<option value="" >Seleccionar Tipo de Pago</option>
                      <option   value="1">Efectivo </option>
                      <option   value="2">Tarjeta de Credito </option>
                      <option   value="3">Tarjeta de Debito </option>
                      <option   value="4">Cheque </option>
              	</select>
          	</div>
          	<div class="form-group">
          			<label for="monto_a_cobrar">Monto a Cobrar:</label>
          			<input type="number" name="monto_a_cobrar"  class="form-control" placeholder="Monto" > 	
          	</div>
          	<div class="form-group">
          			<label for="observacion_cobro">Observacion:</label>
          			<input type="test" name="observacion_cobro"  class="form-control" required placeholder="Observacion" > 	
          	</div>
          	<button type="button" name="cobrar" id="cobrar"  class="btn btn-success">Cobrar</button>
			</div>
  </div>
  
  </div>
  
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
    $('#borrar_fila').on('click', function () {
    	borrarfila('detalle');
        
    });
});

$(document).ready(function() {	
    $('#medico').on('click', function () {
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
			 data.forEach(recorrerdata);
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert(errors);
            },

        });
        
    });
});



function agregarfila(){
	$('#detalle').append("<tr> "+
														"<td>"+
    														
    											               
    											              "<select  name='factura_concepto' id='factura_concepto' class='form-control selectpicker'>"+
    											               " <option value='' >Seleccionar Concepto</option>"+
    											                "@foreach($factura_concepto as $concepto)"+
    											                  "<option   value='{{ $concepto->id }}'>{{ $concepto->descripcion }} </option>"+
    											                "@endforeach"+
    											              "</select>"+
											          			
											          		" </td>" +
														'<td><input type="number" name="cantidad" class="form-control" placeholder="Cantidad" > 	</td>'+
														'<td><select  name="impuesto" id="impuesto" class="form-control selectpicker>'+
										                '<option value="" >Seleccionar Impuesto</option>'+
										               '@foreach($impuestos as $impuesto)'+
										                '  <option   value="{{ $impuesto->id }}">{{ $impuesto->nombre }} </option>'+
										                '@endforeach'+
										              '</select></td>'+
														 '<td><input type="number" name="precio_unitario" class="form-control" placeholder="Precio unitario" ></td>'+
														 '<td><input type="number" name="monto_detalle" class="form-control" placeholder="Precio Total" ></td>'+
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