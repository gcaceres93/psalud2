@extends('layouts.master')

@section('main_content')




<div class="container">

  <div class="row">
  	<div class="col-md-6">
        <h1>Registro de consulta</h1>
        <h4><a class="btn btn-warning" href="{{ route('consulta.index') }}">Listar consultas</a></h4>
        <hr />
    </div>
    <div class="col-md-6">
       <div class="btn-group well well-lg">
       	  <h1>Acciones desde consulta</h1> 	
          <button type="button" class="btn btn-primary">Generar anamnesis</button>
          <button type="button" class="btn btn-danger">Generar diagnóstico</button>
          <button type="button" class="btn btn-info">Generar plan de tratamiento</button>
          <hr />
		</div>
    </div>
  </div>
  <div class="row">
  	<form method="post" id="formulario" action="/consulta">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="paciente" name="paciente" class="form-control selectpicker">
                <option value="" >--- Seleccionar paciente ---</option>
                @foreach($pacientes as $paciente)
                  <option value="{{ $paciente->id }}">{{ $paciente->nombre }}  {{ $paciente->apellido }}</option>
                @endforeach
             </select>
             </div>
             <div class="col-md-6"><a href="{{ route('paciente.create') }}"> Crear nuevo paciente</a></div>
  		</div>
 </div>	
<!--  row	 -->
  		<br/>
  		
  	
  <div class="row">		
  		<div class="form-group">
  			 <label for="medico">Médico</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="medico" name="medico" class="form-control selectpicker">
                <option value="" >--- Seleccionar médico ---</option>
                @foreach($empleados as $empleado)
                  <option value="{{ $empleado->id }}">{{ $empleado->nombre }}  {{ $empleado->apellido }} - {{$empleado->descripcion }}</option>
                @endforeach
             </select>
             </div>
             <div class="col-md-6"><a href="{{ route('medico.create') }}">Crear nuevo médico</a></div>
  		</div>
  		<br/>
  		<br/>
  </div> 

  <div class="row">		
  		<div class="form-group">
  			 <label for="cantidad_horas">Cantidad de horas</label>
  			 <br/>
  			<div class="col-md-6">
              <input id="cantidad_horas" name="cantidad_horas" placeholder="Cantidad de horas" class="form-control"  type="number">
             </div>
  		</div>
  		<br/>
  		<br/>
  </div> 
  
		<div class="row">
  		<div class="form-group">
              <label class="col-md-3 control-label" >Fecha de consulta</label> 
                <div class="col-md-3 inputGroupContainer">
                <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input id="fecha" name="fecha" placeholder="Fecha de la consulta" class="form-control"  type="date">
                </div>
              </div>
		</div>
  		</div>
<!--   		row -->
  		<br />
  		
  		
		<div class="row">
      		<div class="form-group col-md-6">
              <label for="comentario">Observaciones:</label>
              <textarea name="observaciones" class="form-control" rows="5" id="observaciones"></textarea>
            </div>
		</div>
<!-- 		row -->
		<br/>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success btn-lg col-md-6 ">Guardar</button>
			</div>
		</div>
		<br/>
		<div id='success' class='hidden alert alert-success col-md-6'> Registro guardado correctamente </div>
	</form>     
  </div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function() {	
	$( '#formulario' ).on( 'submit', function(e) {
	    e.preventDefault();
        var observaciones = $('#observaciones').val();
        var fecha = $('#fecha').val();
        var cantidad_horas = $('#sucursal').val();
        var medico = $('#medico').val();
        var paciente = $('#paciente').val();

        var data = {medico:medico,paciente:paciente,cantidad_horas:cantidad_horas,fecha:fecha,observaciones:observaciones, _token: "{{ csrf_token() }}"};
        $.ajax({
            method: 'post',
            url: 'store',
            data:  data,
            success: function(example){
            		console.log(example);
            		$("#success").removeClass("hidden");       			   		
            	    $("body").scrollTop($("#success").offset().top);
            	    $(".container :input").attr("disabled", true);
            	    $(".well-lg :input").attr("disabled", false);

            	
            },
            error: function(data){
            	var errors = data.responseJSON;
                alert(errors);
            },

        });
    });
});
</script>
@endsection
