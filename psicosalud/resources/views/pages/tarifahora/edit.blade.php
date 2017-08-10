@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de Tarifas</h1>
    <h4><a href="{{ route('tarifaHora.index') }}">Listar Tarifas</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/tarifaHora/{{ $tarifa->id }}">
  	
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
  		
  		<div class="form-group">
  		 <label for="medico">Medico</label>
      		<select required name="empleado" class="form-control selectpicker">
                <option value="" >Seleccionar empleado</option>
                @foreach($empleado as $empleados)	
                	<?php
                             $selected = ""
                            
                         ?>
                	@if ($empleados->id == $tarifa->empleado_id)
                    	 <?php
                             $selected = "selected"
                         ?>
         			@endif
                	
                  			<option  <?php echo ($selected) ?>    value="{{ $empleados->id }}">{{ $empleados->persona->nombre}} {{ $empleados->persona->apellido}} </option>
                  	
                @endforeach
          </select>
    
  
 		 </div>
 		 <div class="form-group">
 		  <label for="modalidad">Modalidad</label>
      		<select required name="modalidad" class="form-control selectpicker">
                <option value="" >Seleccionar modalidad</option>
                @foreach($modalidades as $modalidad)
                	<?php
                             $selected = ""
                            
                         ?>
                	@if ($modalidad->id == $tarifa->modalidad_id)
                    	 <?php
                             $selected = "selected"
                         ?>
         			@endif
                
                  		<option  <?php echo ($selected) ?>   value="{{ $modalidad->id }}">{{ $modalidad->descripcion}} </option>
                @endforeach
          </select>
    
  
 		 </div>

  		<div class="form-group">
        <label for="Codigo">Codigo</label>
        <input type="text" required name="codigo" class="form-control" placeholder="Codigo" value="{{ $tarifa->codigo }}" >   
      </div>
      <div class="form-group">
        <label for="Tarifa">Tarifa por hora</label>
        <input type="text" required name="tarifa" class="form-control" placeholder="Tarifa por Hora"  value="{{ $tarifa->tarifa }}">   
      </div>
     
  		 

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection