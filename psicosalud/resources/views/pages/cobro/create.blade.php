@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Cobros</h1>
    <h4><a href="{{ route('cobro.index') }}">Listar cobros</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/cobro">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  		
  		<div class="form-group">
          			<label for="factura">Factura</label>
          			<select  required name="factura" id="factura"     class="form-control selectpicker">
<!--           			@foreach($facturas as $asaniu) -->
       					
          						<option selected  value ="{{$facturas->id}}">{{$facturas->nro}}</option>
<!--           			@endforeach -->
            	
                
                 

              	</select>
          	</div>
          	
          	
		
  			
  	<div class="form-group">
          			<label for="tipo_pago">Tipo de Pago:</label>
          			<select required name="tipo_pago" id="tipo_pago"  class="form-control selectpicker">
                	<option value="" >Seleccionar Tipo de Pago</option>
                      <option   value="1">Efectivo </option>
                      <option   value="2">Tarjeta de Credito </option>
                      <option   value="3">Tarjeta de Debito </option>
                      <option   value="4">Cheque </option>
              	</select>
          	</div>
          	<div class="form-group">
          			<label for="monto_a_cobrar">Monto a Cobrar:</label>

       					<input required type="number" name="monto_a_cobrar" value ="{{$facturas->monto_total}}"  id="monto_a_cobrar"  class="form-control" placeholder="Monto" > 	

          			
          	</div>
          	<div class="form-group">
          			<label for="observacion">Observacion:</label>
          			<input type="test" name="observacion" id="observacion"  class="form-control" required placeholder="Observacion" > 	
          	</div>
          	<button type="submit" name="cobrar" id="cobrar"  class="btn btn-success">Cobrar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection