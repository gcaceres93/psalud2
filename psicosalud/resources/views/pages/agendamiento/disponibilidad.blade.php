@extends('layouts.master')

@section('main_content')




<div class="container">
  <div class="row">
    <h1>Registro de agendamiento</h1>
    <h4><a class="btn btn-warning" href="{{ route('agendamiento.index') }}">Listar agendamientos</a></h4>
    <hr />
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
              <input id="fecha_programada" name="fecha_programada" placeholder="Fecha para la consulta" class="form-control" value="{{$fecha}}"  type="date">
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
              <input id="hora_programada" name="hora_programada" placeholder="Fecha para la consulta" class="form-control" value="{{$hora}}"  type="time">
                </div>
              </div>
		</div>
		</div>
<!-- 		row -->
		
<!-- 		row -->
		<br/>
		<div class="row">
			<div class="col-md-12">
				<button type="button" id="disponibilidad" class="btn btn-info col-md-3">Verificar disponibilidad </button>   <a href="{{ route('agendamiento.index') }}" class="btn btn-danger col-md-3">Salir</a>
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
        var sucursal = $('#sucursal').val();
        var medico = $('#medico').val();
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

