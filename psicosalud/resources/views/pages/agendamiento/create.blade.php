@extends('layouts.master')

@section('main_content')

<style>
    .hidden{
        display:none;
    }
</style>



<div class="container">
  <div class="row">
    <h1>Registro de agendamiento</h1>
    <h4><a class="btn btn-warning" href="{{ route('agendamiento.index') }}">Listar agendamientos</a></h4>
    <hr />
  </div>
  <div class="row">
  	<form method="post" action="/agendamiento">
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
<!--   row		 -->
	<div class="row">
  		<div class="form-group col-md-6">
  			 <label for="modalidad">Modalidad de consulta</label>
  			 <br/> 			
  			<select id="modalidad" name="modalidad" class="form-control selectpicker">
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
  			
  			<select id="sucursal" name="sucursal" class="form-control selectpicker">
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
              <input id="fecha_programada" name="fecha_programada" placeholder="Fecha para la consulta" class="form-control"  type="date">
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
              <input id="hora_programada" name="hora_programada" placeholder="Fecha para la consulta" class="form-control"  type="time">
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
				<a href="#" id="disponibilidad" class="btn btn-info col-md-3">Verificar disponibilidad </a>   <button type="submit" class="btn btn-success col-md-3">Guardar</button>
			</div>
		</div>
		<br/>
		<div id="sugerenciaContainer" class="hidden">
    		<div class="row">
    			 <div class="form-group has-error has-feedback">
                  <label class="col-md-3 control-label" for="inputError">Fecha/horario no disponible</label>
                  <div class="col-md-3">
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                  </div>
    		     </div>
    		</div>
    		<div class="row">
             <div class="form-group has-warning has-feedback">
                  <label class="col-sm-3 control-label" for="inputWarning">Sugerencia de horario:</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputWarning" value="12/08/2017 18:00:00 ">
                  </div>
                </div>
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
        var sucursal = $('#sucursal').val();
        var medico = $('#medico').val();
        var data = {medico:medico,sucursal:sucursal,fecha_programada:fecha_programada,hora_programada:hora_programada};
        $.ajax({
            method: 'get',
            url: '/verificarDisponibilidad',
            data:  data,
            async: true,
            success: function(data){
                console.log(data);
            },
            error: function(data){
                console.log(data);
                alert("fail" + ' ' + this.data)
            },

        });
    });
});
</script>
@endsection
