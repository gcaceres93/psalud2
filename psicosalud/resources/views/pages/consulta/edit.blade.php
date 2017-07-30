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
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		{{ method_field('PUT') }}
		
  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="paciente" name="paciente" class="form-control selectpicker">
                <option value="{{ $pac->id }}" >{{ $pac->nombre }} {{ $pac->apellido }} </option>
                @foreach($pacientes as $paciente)
                  <option value="{{ $paciente->id }}">{{ $paciente->nombre }}  {{ $paciente->apellido }} </option>
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
                <option value="{{ $emp->id }}" >{{ $emp->nombre }} {{ $emp->apellido }} </option>
                @foreach($empleados as $empleado)
                  <option value="{{ $empleado->id }}">{{ $agendamiento->empleado->nombre }}  {{ $empleado->apellido }} - {{$empleado->descripcion }}</option>
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
  		<div class="form-group">
  			 <label for="modalidad">Modalidad de consulta</label>
  			 <br/> 	
  			 <div class="col-md-6">		
      			<select id="modalidad" name="modalidad" class="form-control selectpicker">
                    <option value="{{$agendamiento->modalidad->id}}" > {{$agendamiento->modalidad->descripcion}} </option>
                    @foreach($modalidades as $modalidad)
                      <option value="{{ $modalidad->id }}">{{ $modalidad->descripcion }}</option>
                    @endforeach
                 </select>
             </div>
  		</div>
  	</div>	
<!--   	row -->
	<br/>
	<div class="row">
  		<div class="form-group">
  			 <label for="sucursal">Sucursal</label>
  			 <br/>
  			<div class="col-md-6">
      			<select id="sucursal" name="sucursal" class="form-control selectpicker">
                    <option value="{{ $agendamiento->sucursal->id}}" >{{ $agendamiento->sucursal->nombre}}</option>
                    @foreach($sucursales as $sucursal)
                      <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                    @endforeach
                 </select>
             </div>
  		</div>
     </div>	
     <br/>	
<!--      row	 -->
		<div class="row">
      		<div class="form-group">
      		     <label for="fecha_programada" >Fecha programada</label> 
      		     <br/>
      			 <div class="col-md-6">
      			      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                          <input id="fecha_programada" value="{{ $agendamiento->fecha_programada }}" name="fecha_programada" placeholder="Fecha para la consulta" class="form-control"  type="date">
                 	  </div>	
                 </div>
           </div>
        </div>      
		
<!--   		row -->
  		<br />
  		
  		<div class="row">
  		<div class="form-group">
              <label for="hora_programada" >Hora programada</label> 
              <br/>
                <div class="col-md-6">
                <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              <input value="{{ $agendamiento->hora_programada }}" id="hora_programada" name="hora_programada" placeholder="Fecha para la consulta" class="form-control"  type="time">
                </div>
              </div>
		</div>
		</div>
<!-- 		row -->
		<br/>
		<div class="row">
		     <div class="form-group">
		    <label for="comentario">Comentarios:</label>
		    	<br/>
		       <div class="col-md-6">
              	 <textarea name="comentario" class="form-control" rows="5" id="comentario"></textarea>
               </div>
            </div>
		</div>
<!-- 		row -->

<br/>
 		<div class="row">
            <div class="col-md-2">
            
            <label for="asistio">Asistio</label>
            <br/>
            </div>
                <div class="col-md-3">
                   	   @if($agendamiento->asistio)
                      	 	<label><input type="checkbox" name="asistio" value="1" checked></label>
                   	   @else
                   	   		<label><input type="checkbox" name="asistio" value="1"></label>
                   	   @endif
             </div>
        <!-- 		row -->
		<br/>
		<div class="row">
			<div class="col-md-12">
				 <button type="submit" class="btn btn-success col-md-6">Actualizar</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				 <a href="{{ URL('/agendamientoConsulta/'.$agendamiento->id.'?agenda=true' )}}" class="btn btn-danger col-md-6">Generar consulta</a>
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