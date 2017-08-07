@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Registro de diagnóstico</h1>
        <hr />
    </div>
      <center><img class="img-responsive" src="/img/lupa.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/diagnostico">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $anamnesis->pid)  }}" > {{ $anamnesis->pid }} - {{$anamnesis->pnombre}}  {{$anamnesis->papellido}} </a>
        			<input type="hidden" name="id" />
        			<input type="hidden" name="anamnesis" value="{{ $anamnesis->id }}"/>
        			<input type="hidden" name="paciente" value="{{ $anamnesis->pid }}"/>
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Anamnesis:</label>
        			<a href="{{ route('anamnesis.show', $anamnesis->id)  }}" >{{$anamnesis->id }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($consultas)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Consulta asociada:</label>
				<select id="consulta" name="consulta" class="form-control selectpicker">
                    <option value="" >--- Seleccionar consulta ---</option>
                    @foreach($consultas as $consulta)
                      <option value="{{ $consulta->id }}">{{ $consulta->fecha }} </option>
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
              <textarea name="diagnostico_presuntivo" class="form-control" rows="5" id="diagnostico_presuntivo"></textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Diagnóstico final:</label>
              <textarea name="diagnostico_final" class="form-control" rows="5" id="diagnostico_final"></textarea>
            </div>
		</div>
		
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Observaciones:</label>
              <textarea name="observaciones" class="form-control" rows="5" id="observaciones"></textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Resultado obtenido:</label>
              <textarea name="resultado_obtenido" class="form-control" rows="5" id="resultado_obtenido"></textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="comentario">Recomendaciones:</label>
              <textarea name="recomendaciones" class="form-control" rows="5" id="recomendaciones"></textarea>
            </div>
		</div>
		
	
		
		<div class="form-group">
              <label for="acepta_tratamiento">¿Acepta tratamiento?</label> 
                 <input id="acepta_tratamiento" type="checkbox" name="acepta_tratamiento" value="1">
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