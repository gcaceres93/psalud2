@extends('layouts.master')

@section('main_content')

<style>
    .hidden{
        display:none;
    }
</style>



<div class="container">
 
  <div class="row">
  	<form method="post" action="/consulta/{{ $consulta->id }}">
  	{{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<h1>Edición de consultas</h1>
		 <h4><a class="btn btn-warning" href="{{ route('consulta.index') }}">Listar consultas</a></h4>
        <hr />
		
  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-6">
  			<select  required id="paciente" name="paciente" class="form-control selectpicker">
                <option value="{{ $pac->id }}" >{{ $pac->nombre }} {{ $pac->apellido }} </option>
                @foreach($pacientes as $paciente)
                  <option value="{{ $paciente->id }}">{{ $paciente->nombre }}  {{ $paciente->apellido }} </option>
                @endforeach
             </select>
             </div>
  		</div>
 </div>	
 <br/>
<!--  row	 -->
 <div class="row">		
  		<div class="form-group">
  			 <label for="agendamiento">Agendamiento</label>
  			 <br/>
  			<div class="col-md-6">
  			<select required  name="agendamiento" id="agendamiento" class="form-control selectpicker">
                <option value="" >Seleccionar Agendamiento</option>
                 @foreach($agendamientos as $agendamiento)
                 <?php
                                 $selected = ""
                                
                             ?>
                    	@if ($agendamiento->id == $consulta->agendamiento_id)
                        	 <?php
                                 $selected = "selected"
                             ?>
             			@endif
                  <option  <?php echo ($selected) ?> value="{{ $agendamiento->id }}">{{ $agendamiento->fecha_programada }}  {{ $agendamiento->hora_programada }} </option>
                @endforeach
              </select>
             </div>
<!--              <div class="col-md-6"><a href="{{ route('medico.create') }}">Crear nuevo médico</a></div> -->
  		</div>
  		<br/>
  		<br/>
  </div> 
  		
 
  		
  	
  <div class="row">		
  		<div class="form-group">
  			 <label for="medico">Médico</label>
  			 <br/>
  			<div class="col-md-6">
  			<select required id="medico" name="medico" class="form-control selectpicker">
                <option value="{{ $emp->id }}" >{{ $emp->nombre }} {{ $emp->apellido }} </option>
                @foreach($empleados as $empleado)
                  <option value="{{ $empleado->id }}">{{ $empleado->nombre }}  {{ $empleado->apellido }} - {{$empleado->descripcion }}</option>
                @endforeach
             </select>
             </div>
  		</div>
  		<br/>
  		<br/>
  </div> 
<!--   row		 -->
	 <div class="row">		
  		<div class="form-group">
  			 <label for="cantidad_horas">Cantidad de horas</label>
  			 <br/>
  			<div class="col-md-6">
              <input required id="cantidad_horas" value="{{ $consulta->cantidad_horas }}"  name="cantidad_horas"  placeholder="Cantidad de horas" class="form-control"  type="number">
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
              <input required id="fecha" value="{{ $consulta->fecha }}" name="fecha" placeholder="Fecha de la consulta" class="form-control"  type="date">
                </div>
              </div>
		</div>
  		</div>
<!--   		row -->
  		<br />
  		
  		
		<div class="row">
      		<div class="form-group col-md-6">
              <label for="comentario">Observaciones:</label>
              <textarea required name="observaciones" class="form-control" rows="5" id="observaciones"> {{ $consulta->observaciones }} </textarea>
            </div>
		</div>
<!-- 		row -->
  		<br />
  		
  		
<!-- 		row -->
		


 		
        <!-- 		row -->
		<br/>
		<div class="row">
			<div class="col-md-12">
				 <button type="submit" class="btn btn-success col-md-6">Actualizar</button>
			</div>
		</div>
		
		
		<br/>
			
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