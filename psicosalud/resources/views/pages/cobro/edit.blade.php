@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de cobros</h1>
    <h4><a href="{{ route('cobro.index') }}">Listar cobros</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
    
  	<form method="post" action="/cobro/{{$cobros->id}}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
          			<label for="factura">Factura</label>
          			
            	
                <select required  name="factura_id" id="factura_id"    value ="" class="form-control selectpicker">
                 <option selected  value ="{{$cobros->factura_id}}">{{$cobros->nro}}</option> 

              	</select>
          	</div>
          	
          	
		
  			
  	<div class="form-group">
          			<label for="tipo_pago">Tipo de Pago:</label>
          			<select  required name="tipo_pago" id="tipo_pago"  class="form-control selectpicker">
                	<option value="" >Seleccionar Tipo de Pago</option>
                      <option <?php if ($cobros->tipo_pago == 1) {echo ('selected');}  ?>   value="1">Efectivo </option>
                      <option <?php if ($cobros->tipo_pago == 2) {echo ('selected');}  ?>  value="2">Tarjeta de Credito </option>
                      <option  <?php if ($cobros->tipo_pago == 3) {echo ('selected');}  ?> value="3">Tarjeta de Debito </option>
                      <option  <?php if ($cobros->tipo_pago == 4) {echo ('selected');}  ?> value="4">Cheque </option>
              	</select>
          	</div>
          	<div class="form-group">
          			<label for="monto_a_cobrar">Monto a Cobrar:</label>
          			<input  required type="number" name="monto_a_cobrar"  id="monto_a_cobrar"  class="form-control" value="{{$cobros->monto}}"placeholder="Monto" > 	
          	</div>
          	<div class="form-group">
          			<label for="observacion">Observacion:</label>
          			<input type="test" name="observacion" id="observacion"  value="{{$cobros->observacion}}" class="form-control" required placeholder="Observacion" > 	
          	</div>
          	<button type="submit" name="cobrar" id="cobrar"  class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection