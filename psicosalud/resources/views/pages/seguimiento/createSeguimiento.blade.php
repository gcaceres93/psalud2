@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Registro de seguimiento</h1>
        <hr />
    </div>
      <center><img class="img-responsive" src="/img/plan.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/seguimiento">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $plan->pid)  }}" > {{ $plan->pid }} - {{$plan->pnombre}}  {{$plan->papellido}} </a>
        			<input type="hidden" name="id" />
        			<input type="hidden" name="plan" value="{{ $plan->id }}"/>
        			<input type="hidden" name="paciente" value="{{ $plan->pid }}"/>
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Plan de tratamiento:</label>
        			<a href="{{ route('planTratamiento.show', $plan->id)  }}" >{{$plan->id }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($consultas)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Consulta asociada:</label>
				<select required id="consulta" name="consulta" class="form-control selectpicker">
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
              <label required for="observaciones">Observaciones:</label>
              <textarea name="observaciones" class="form-control" rows="5" id="observaciones"></textarea>
            </div>
		</div>
		
		
		
		
		
		<br/>
		
		<div class="row">
			<div class="col-md-12">
				<center><button type="submit" class="btn btn-success">Guardar</button></center>
			</div>
		</div>
		<br/>
	</form>     
  </div>
</div>
</div>



@endsection