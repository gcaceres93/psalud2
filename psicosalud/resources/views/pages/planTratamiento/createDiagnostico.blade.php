@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Registro de plan de tratamiento</h1>
        <hr />
    </div>
      <center><img class="img-responsive" src="/img/plan.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/planTratamiento">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $diagnostico->pid)  }}" > {{ $diagnostico->pid }} - {{$diagnostico->pnombre}}  {{$diagnostico->papellido}} </a>
        			<input type="hidden" name="id" />
        			<input type="hidden" name="diagnostico" value="{{ $diagnostico->id }}"/>
        			<input type="hidden" name="paciente" value="{{ $diagnostico->pid }}"/>
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Diagnóstico:</label>
        			<a href="{{ route('diagnostico.show', $diagnostico->id)  }}" >{{$diagnostico->id }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($tipoTerapias)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Tipo de terapia:</label>
				<select id="tipoTerapia" name="tipoTerapia" class="form-control selectpicker">
                    <option value="" >--- Seleccionar tipo de terapia ---</option>
                    @foreach($tipoTerapias as $tp)
                      <option value="{{ $tp->id }}">{{ $tp->nombre }} </option>
                    @endforeach
             	</select>        		
             	</div>
        	</div>
 		</div>
  		<br/>
  		@endif
  			
  
  		<div class="row">
      		<div class="form-group col-md-4">
              <label for="fecha_inicio">Fecha de inicio:</label>
              <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio">
            </div>
            <div class="form-group col-md-4">
              <label for="fecha_inicio">Fecha final:</label>
              <input type="date" name="fecha_final" class="form-control"  id="fecha_inicio">
            </div>
            <div class="form-group col-md-4">
              <label for="cantidad_sesiones">Cantidad de sesiones:</label>
              <input type="number" name="cantidad_sesiones" class="form-control"  id="cantidad_sesiones">
            </div>
		</div>
		
	
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="alcance">Alcance:</label>
              <textarea name="alcance" class="form-control" rows="5" id="alcance"></textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="resultados_esperados">Resultados esperados:</label>
              <textarea name="resultados_esperados" class="form-control" rows="5" id="resultados_esperados"></textarea>
            </div>
		</div>
		
		
		
		<br/>
		
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success">Guardar</button>
			</div>
		</div>
		<br/>
	</form>     
  </div>
</div>
</div>



@endsection