@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Aplicacion de Test</h1>
    <h4><a href="{{ route('aplicarTest.index') }}">Listar test aplicado</a></h4>
    <hr />
  </div>
  <div class="row">
   
  	<form method="post" action="/aplicarTest">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
 	<div class="col-md-6">
  		<div class="form-group"> 
              <label>Paciente</label>
               
              <select required name="paciente" id="paciente" class="form-control selectpicker">
                <option value="" >Seleccionar paciente</option>
                @foreach($personas as $paciente)
                  <option   value="{{ $paciente->id }}">{{ $paciente->apellido }}, {{ $paciente->nombre}} </option>
                @endforeach
              </select>
    
  
  			</div>
  			<div class="form-group"> 
              <label>Test</label>
               
              <select required  name="test" id="test" class="form-control selectpicker">
                <option value="" >Seleccionar test</option>
                @foreach($test as $tes)
                  <option   value="{{ $tes->id }}">{{ $tes->nombre }} </option>
                @endforeach
              </select>
    
  
  			</div>
			</div>
			<div class="col-md-6">
        			<div class="form-group">
          			<label for="Fecha">Fecha</label>
          			<input type="date" required name="fecha" value= <?php  $dia= date('o-m-d'); echo($dia); ?>  id="fecha" class="form-control" > 	
          		</div>
          		<div class="form-group">
          			<label for="tipo_aplicacion">Tipo de Aplicacion</label>
          			<select required  name="tipo_aplicacion" id="tipo_aplicacion" class="form-control selectpicker">
                          <option selected  value="1">Diagnostico</option>
                          <option   value="2">Tratamiento</option>
                        
             		 </select> 	
          		</div>
			
			</div>
  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    
  </div>
</div>

@endsection