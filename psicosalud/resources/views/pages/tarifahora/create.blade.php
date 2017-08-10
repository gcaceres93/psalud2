@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Tarifas</h1>
    <h4><a href="{{ route('tarifaHora.index') }}">Listar tarifas</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/tarifaHora">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group"> 
      <label>Medico</label>
       
      <select required  name="persona" id="persona" class="form-control selectpicker">
        <option value="" >Seleccionar empleado</option>
        @foreach($data as $persona)
          <option   value="{{ $persona->persona->id }}">{{ $persona->persona->apellido }}, {{ $persona->persona->nombre}} </option>
        @endforeach
      </select>
    
  
  	</div>
  		<div class="form-group"> 
      <label>Modalidad</label>
       
      <select required  name="modalidad" id="modalidad" class="form-control selectpicker">
        <option value="" >Seleccionar modalidad</option>
        @foreach($modalidades as $modalidad)
          <option   value="{{ $modalidad->id }}">{{ $modalidad->descripcion }}</option>
        @endforeach
      </select>
    
  
  	</div>
  		<div class="form-group">
  			<label for="codigo">Codigo</label>
  			<input type="text" required name="codigo" id="codigo" class="form-control" placeholder="Codigo"> 	
  		</div>
      <div class="form-group">
        <label for="tarifa">Tarifa por Hora</label>
        <input type="text"  required name="tarifa" class="form-control" placeholder="Tarifa por hora">   
      </div>
      
      

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection