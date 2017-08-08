@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Plan de tratamiento N° {{ $plan->id }}</h1>
        <hr />
    </div>
      <center><img class="img-responsive" src="/img/plan.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
   <div class="row">
    <div class="col-md-12">
    	<div class="btn-group">
   		<a href="{{ url('/crearSeguimientoTratamiento/'.$plan->id) }}" class="btn btn-warning btn-group"><span class="glyphicon glyphicon-search"></span> Registrar seguimiento</a>
   		<a href="{{ url('/listarSeguimientoTratamiento/'.$plan->id) }}" class="btn btn-info btn-group"><span class="glyphicon glyphicon-list"></span> Listar seguimientos</a>

   		</div>
    </div>
   </div> 
    <hr />
  <div class="row">
  	<form method="post" id="formulario" action="/planTratamiento">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $plan->pid)  }}" > {{ $plan->pid }} - {{$plan->pnombre}}  {{$plan->papellido}} </a>
        			<input type="hidden" name="id" />
        			<input type="hidden" name="diagnostico" value="{{ $plan->did }}"/>
        			<input type="hidden" name="paciente" value="{{ $plan->pid }}"/>
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Diagnóstico:</label>
        			<a href="{{ route('diagnostico.show', $plan->did)  }}" >{{$plan->did }}</a>
        		</div>
        	</div>
 		</div>
  		
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Tipo de terapia:</label>
				<select disabled id="tipoTerapia" name="tipoTerapia" class="form-control selectpicker">
                    <option value="{{ $plan->tid }}" >{{ $plan->tnombre }}</option>
                   
             	</select>        		
             	</div>
        	</div>
 		</div>
  		<br/>
  			
  
  		<div class="row">
      		<div class="form-group col-md-4">
              <label for="fecha_inicio">Fecha de inicio:</label>
              <input disabled type="date" name="fecha_inicio" class="form-control" id="fecha_inicio" value="{{ $plan->fecha_inicio }}">
            </div>
            <div class="form-group col-md-4">
              <label for="fecha_inicio">Fecha final:</label>
              <input disabled type="date" name="fecha_final" class="form-control"  id="fecha_inicio" value="{{ $plan->fecha_final }}">
            </div>
            <div class="form-group col-md-4">
              <label for="cantidad_sesiones">Cantidad de sesiones:</label>
              <input disabled type="number" name="cantidad_sesiones" class="form-control"  id="cantidad_sesiones" value="{{ $plan->cantidad_sesiones }}">
            </div>
		</div>
		
	
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="alcance">Alcance:</label>
              <textarea disabled name="alcance" class="form-control" rows="5" id="alcance">{{ $plan->alcance }}</textarea>
            </div>
		</div>
		
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="resultados_esperados">Resultados esperados:</label>
              <textarea disabled name="resultados_esperados" class="form-control" rows="5" id="resultados_esperados"> {{ $plan->resultados_esperados }} </textarea>
            </div>
		</div>
		
		
		
		<br/>
		
		
		<br/>
	</form>     
  </div>
</div>
</div>



@endsection