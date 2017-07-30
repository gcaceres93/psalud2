@extends('layouts.popup')

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
		
	<div class="col-md-4">
        <h1>Consulta N° {{ $consulta->id }}</h1>
        <h4><a class="btn btn-warning" href="{{ route('consulta.index') }}">Listar consultas</a></h4>
        <hr />
    </div>
    <div class="col-md-8">
       <div class="btn-group well well-lg">
       	  <h1>Acciones desde consulta</h1> 	
          <button type="button" class="btn btn-primary">Generar anamnesis</button>
          <button type="button" class="btn btn-danger">Generar diagnóstico</button>
          <button type="button" class="btn btn-info">Generar plan de tratamiento</button>
          <hr />
		</div>
    </div>
  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="paciente" name="paciente" class="form-control selectpicker" disabled>
                 <option value="{{ $pac->id }}" >{{ $pac->nombre }} {{ $pac->apellido }} </option>
             </select>
             </div>
  		</div>
 </div>	
<!--  row	 -->
  		<br/>
  		
  	
  <div class="row">		
  		<div class="form-group">
  			 <label for="medico">Médico</label>
  			 <br/>
  			<div class="col-md-6">
  			<select id="medico" name="medico" class="form-control selectpicker" disabled>
                <option value="{{ $emp->id }}" >{{ $emp->nombre }} {{ $emp->apellido }} </option>
               
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
              <input id="cantidad_horas" value="{{ $consulta->cantidad_horas }}"  name="cantidad_horas" placeholder="Cantidad de horas" class="form-control"  type="number" disabled>
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
              <input id="fecha" value="{{ $consulta->fecha }}" name="fecha" placeholder="Fecha de la consulta" class="form-control"  type="date" disabled>
                </div>
              </div>
		</div>
  		</div>
<!--   		row -->
  		<br />
  		
  		
		<div class="row">
      		<div class="form-group col-md-6">
              <label for="comentario">Observaciones:</label>
              <textarea name="observaciones" class="form-control" rows="5" id="observaciones" disabled> {{ $consulta->observaciones }} </textarea>
            </div>
		</div>
<!-- 		row -->
  		<br />
  		
  		
<!-- 		row -->
		


 		
        <!-- 		row -->
		<br/>
		
		
		<br/>
			
	</form>     
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