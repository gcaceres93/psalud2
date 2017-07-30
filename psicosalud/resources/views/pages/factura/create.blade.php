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
      <label>Tipo de Factura</label>
      <select  name="tipo_pago" id="tipo_pago" class="form-control selectpicker">
        	<option value="" >Seleccionar Tipo de Factura</option>
              <option   value="Contado">Contado </option>
              <option   value="Credito">Credito </option>
      </select>
       <div class="form-group">
  			<label for="fecha">Fecha de Factura:</label>
  			<input type="date" name="fecha" class="form-control"  > 	
  		</div>
      <div class="form-group">
  			<label for="nro">Numero de Factura:</label>
  			<input type="text" name="nro" class="form-control" placeholder="Numero de Factura" value="{{ $nro_factura }}"> 	
  		</div>
  		<div class="form-group">
  			<label for="nro">Timbrado:</label>
  			<input type="text" name="timbrado" class="form-control" placeholder="Numero de Timbrado" value="{{ $factura->timbrado }}"> 	
  		</div>
  		<div class="form-group">
  			<label for="fecha_timbrado">Fecha Validez Timbrado:</label>
  			<input type="date" name="vigencia_timbrado" class="form-control"  value="{{ $factura->vigencia_timbrado }}"> 	
  		</div>
  		<div class="form-group">
  			<label for="observacion">Observaciones:</label>
  			<input type="text" name="observacion" class="form-control" placeholder="Observaciones" > 	
  		</div>
  		<div class="form-group">
  			<label for="nro">Monto Total:</label>
  			<input type="number" name="monto" class="form-control" placeholder="Monto" > 	
  		</div>
  		
    
  
  	</div>

<!--       <div class="form-group"> -->
<!--       <div class="checkbox"> -->
<!--         <label><input id="profesional_salud" type="checkbox" name="profesional_salud" value="1">Es profesional de la salud?</label> -->
<!--       </div> -->
<!--       </div> -->

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {	
    $('#medico').on('change', function () {
    	var medico = $('#medico').val();
        
        var data = {medico:medico};
        $.ajax({
            method: 'get',
            url: '/verificarConsulta',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
			
			 data.forEach(recorrerdata);
		

                
            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert(errors);
            },

        });
        
    });
});
function recorrerdata(value,index,ar){
	
	$('#consulta').html(' <option   value='+value.id+'>'+value.fecha+' '+value.apellido+', '+value.nombre+'</option>');
}
</script>

@endsection