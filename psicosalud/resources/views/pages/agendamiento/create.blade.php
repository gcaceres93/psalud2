@extends('layouts.master')

@section('main_content')




<div class="container">
  <div class="row">
    <h1>Registro de agendamiento</h1>
    <h4><a class="btn btn-warning" href="{{ route('agendamiento.index') }}">Listar agendamientos</a></h4>
    <hr />
  </div>
  <div class="row">
  	<form method="post" action="/agendamiento">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<img class="img-responsive" src="/img/calendar.png" alt="Logo" width="11%" height="11%" class="img-responsive">
		
  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="paciente" required name="paciente" class="form-control selectpicker">
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
  			<select id="medico" required  name="medico" class="form-control selectpicker">
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
<!--   row		 -->
	<div class="row">
  		<div class="form-group col-md-6">
  			 <label for="modalidad">Modalidad de consulta</label>
  			 <br/> 			
  			<select id="modalidad" required  name="modalidad" class="form-control selectpicker">
                <option value="" >--- Seleccionar modalidad ---</option>
                @foreach($modalidades as $modalidad)
                  <option value="{{ $modalidad->id }}">{{ $modalidad->descripcion }}</option>
                @endforeach
             </select>
  		</div>
  	</div>	
<!--   	row -->

	<div class="row">
  		<div class="form-group col-md-6">
  			 <label for="sucursal">Sucursal</label>
  			 <br/>
  			
  			<select id="sucursal" required name="sucursal" class="form-control selectpicker">
                <option value="" >--- Seleccionar sucursal ---</option>
                @foreach($sucursales as $sucursal)
                  <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                @endforeach
             </select>
  		</div>
     </div>		
<!--      row	 -->
		<div class="row">
  		<div class="form-group">
              <label class="col-md-3 control-label" >Fecha programada</label> 
                <div class="col-md-3 inputGroupContainer">
                <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input id="fecha_programada"  required name="fecha_programada" placeholder="Fecha para la consulta" class="form-control"  type="date">
                </div>
              </div>
		</div>
  		</div>
<!--   		row -->
  		<br />
  		
  		<div class="row">
  		<div class="form-group">
              <label class="col-md-3 control-label" >Hora programada</label> 
                <div class="col-md-3 inputGroupContainer">
                <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input id="hora_programada" required name="hora_programada" placeholder="Fecha para la consulta" class="form-control"  type="time">
                </div>
              </div>
		</div>
		</div>
<!-- 		row -->
		<div class="row">
      		<div class="form-group col-md-6">
              <label for="comentario">Comentarios:</label>
              <textarea name="comentario" class="form-control" rows="5" id="comentario"></textarea>
            </div>
		</div>
<!-- 		row -->
		<br/>
		<div class="row">
			<div class="col-md-12">
				<button type="button" id="disponibilidad" class="btn btn-info col-md-3">Verificar disponibilidad </buttom>   <button type="submit" class="btn btn-success col-md-3">Guardar</button>
			</div>
		</div>
		<br/>
		
		<div id="sugerenciaContainer" class="hidden">
    		<div class="row">
    			 <div id="error" class="alert alert-danger col-md-6">
                      
                 </div>
            </div>
            <div class="row">     
                 <div id="sugerencia" class="alert alert-warning col-md-6">
                      
                 </div>
            </div>     
    		
    	</div>
    	<div class="row">	
        	<div id="success" class="hidden alert alert-success col-md-6">
    			   		
        	</div>
    	</div>
	</form>     
  </div>
</div>
</div>


<script type="text/javascript">
$(document).ready(function() {	
    $('#disponibilidad').on('click', function () {
    	var fecha_programada = $('#fecha_programada').val();
        var hora_programada = $('#hora_programada').val();
        var fecha_prog= new Date(fecha_programada);
        var fechas= new Date();
        var dia_prog= fecha_prog.getDay();
       if (hora_programada > '20:00:00' || hora_programada < '07:59:00'){
           
				return alert('El consultorio se encuentra cerrado en ese horario');
           }
       if (fechas >fecha_prog ){ 
           
			return alert('No se pueden programar fechas anteriores al dia de hoy');
      } else if  (dia_prog == 5 || dia_prog == 6) {
    	  return alert('No se pueden programar turnos sabados ni domingos');
          }
        var sucursal = $('#sucursal').val();
        var medico = $('#medico').val();
        if ( medico){
				console.log('ok');}
		else{ return alert('Debe seleccionar Medico'); 		
            }
       
        var data = {medico:medico,sucursal:sucursal,fecha_programada:fecha_programada,hora_programada:hora_programada};
        $.ajax({
            method: 'get',
            url: '/verificarDisponibilidad',
            data:  data,
            async: true,
            dataType:"json",
            success: function(data){
            	if (data == "si"){
            		$("#sugerenciaContainer").hide();
            		$("#success").removeClass('hidden');
            		$("#success").show();
            		$("#success").html("<strong>Existe disponibilidad para la fecha seleccionada</strong>");
            	    $("body").scrollTop($("#success").offset().top);
            	}else{
            		$("#success").hide();
            		$("#sugerenciaContainer").removeClass('hidden');
            		$("#sugerenciaContainer").show();
            		$("#error").html("<strong>Ya existe una agenda para el medico y la fecha seleccionada</strong>");
            		$("#sugerencia").html("<strong>Sugerencia de fecha y horario:</strong>:<br/>Fecha:"+data.fecha+"<br/>Horario:"+data.horario);
            	    $("body").scrollTop($("#sugerenciaContainer").offset().top);

            	}
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
