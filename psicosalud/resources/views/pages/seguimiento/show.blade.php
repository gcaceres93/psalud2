@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Seguimiento</h1>
        <hr />
    </div>
      <center><img class="img-responsive" src="/img/plan.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
   
  </div>
  <div class="row">
  <form method="post" action="/seguimiento/{{ $seguimiento->id }}">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		{{ method_field('PUT') }}

  	
        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Paciente:</label>
        			<a href="{{ route('paciente.show', $seguimiento->pid)  }}" > {{ $seguimiento->pid }} - {{$seguimiento->pnombre}}  {{$seguimiento->papellido}} </a>
        			<input type="hidden" name="id" />
        			<input type="hidden" name="plan" value="{{ $seguimiento->ptid }}"/>
        			<input type="hidden" name="paciente" value="{{ $seguimiento->pid }}"/>
        		</div>
        	</div>
 </div>	
 
<!--  row	 -->

		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="paciente">Plan de tratamiento:</label>
        			<a href="{{ route('planTratamiento.show', $seguimiento->ptid)  }}" >{{$seguimiento->ptid }}</a>
        		</div>
        	</div>
 		</div>
  		
  		@if($seguimiento->fecha)
  		<div class="row">

        	<div class="col-md-12">
        		<div class="form-group"> 
        			<label for="consulta">Consulta asociada:</label>
				<select disabled id="consulta" name="consulta" class="form-control selectpicker">
                    <option value="{{ $seguimiento->cid }}" >{{ $seguimiento->fecha }}</option>
                   
             	</select>        		
             	</div>
        	</div>
 		</div>
  		<br/>
  		@endif
  			
  
  	
	
		<div class="row">
      		<div class="form-group col-md-12">
              <label for="observaciones">Observaciones:</label>
              <textarea disabled name="observaciones" class="form-control" rows="5" id="observaciones">{{ $seguimiento->observaciones }}</textarea>
            </div>
		</div>
		
		
		
		
		
		<br/>
		
		
		<br/>
	</form>     
  </div>
</div>
</div>



@endsection