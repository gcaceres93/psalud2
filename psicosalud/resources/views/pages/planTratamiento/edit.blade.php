@extends('layouts.master')

@section('main_content')




<div class="container">
 	<form method="post" action="/diagnostico/{{ $diagnostico->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="row">
  	<div class="col-md-6">
        <h1>Diagnóstico N° {{ $diagnostico->id }}</h1>
        <hr />
    </div>
   <center><img class="img-responsive" src="/img/lupa.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/diagnostico">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="anamnesis" value="{{ $diagnostico->aid }}"/>
        <input type="hidden" name="paciente" value="{{ $diagnostico->pid }}"/>
        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $diagnostico->pid)  }}" > {{ $diagnostico->pid }} - {{$diagnostico->pnombre}}  {{$diagnostico->papellido}} </a>
        			
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Anamnesis:</label>
        			<a href="{{ route('anamnesis.show', $diagnostico->aid)  }}" >{{$diagnostico->aid }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($diagnostico->fecha)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Consulta asociada:</label>
				<select  id="consulta" name="consulta" class="form-control selectpicker">
                    <option value="{{$diagnostico->cid}}" >{{ $diagnostico->fecha }}</option>
                   	@foreach($consultas as $consulta)
                   	   <option value="{{ $consulta->id }}" >{{ $consulta->fecha }}</option>
                   	@endforeach
             	</select>        		
             	</div>
        	</div>
 		</div>
  		<br/>
  		@endif
  			
  
  		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Diagnóstico presuntivo:</label>
              <textarea  name="diagnostico_presuntivo" class="form-control" rows="5" id="diagnostico_presuntivo">{{ $diagnostico->diagnostico_presuntivo }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Diagnóstico final:</label>
              <textarea name="diagnostico_final"  class="form-control" rows="5" id="diagnostico_final">{{ $diagnostico->diagnostico_final }}</textarea>
            </div>
		</div>
		
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Observaciones:</label>
              <textarea name="observaciones"  class="form-control" rows="5" id="observaciones">{{ $diagnostico->observaciones }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Resultado obtenido:</label>
              <textarea name="resultado_obtenido"  class="form-control" rows="5" id="resultado_obtenido">{{ $diagnostico->resultado_obtenido }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Recomendaciones:</label>
              <textarea name="recomendaciones"  class="form-control" rows="5" id="recomendaciones">{{ $diagnostico->recomendaciones }}</textarea>
            </div>
		</div>
		
	
		
		<div class="form-group">
              <label for="acepta_tratamiento">¿Acepta tratamiento?</label> 
                 @if($diagnostico->acepta_tratamiento)
                 <input id="acepta_tratamiento"  type="checkbox" name="acepta_tratamiento" value="1" checked>
                 @else
                 <input id="acepta_tratamiento"  type="checkbox" name="acepta_tratamiento" value="1">   
                 @endif              
		</div>
			  		<center><button type="submit" class="btn btn-success">Actualizar</button></center>
		
		<br/>
		
		
	</form> 
	    
  </div>
</div>
</div>



@endsection