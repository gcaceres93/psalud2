@extends('layouts.master')

@section('main_content')

<style type="text/css" media="screen">
    html, body{
        margin:0px;
        padding:0px;
        height:100%;
        overflow:hidden;
    }   
</style>

<div class="container">

<h2>Consulta de agenda de médicos</h2>
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
             <div class="col-md-6"><a href="{{ route('medico.create') }}" class="btn btn-info">Crear nuevo médico</a></div>
  		</div>
  		<br/>
  		<br/>
</div>
</div>
<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
        <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
        <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>       
</div>
<script type="text/javascript">
$( document ).ready(function() {
	$('#scheduler_here').hide();
	$('#medico').on('change', function() {
		  var medico = $('#medico').val();
	        var data = {medico:medico};
	        $.ajax({
	            method: 'get',
	            url: '/mostrarAgenda',
	            data:  data,
	            async: true,
	            dataType:"json",
	            success: function(data){
	            	$('#scheduler_here').show();
	            	var a = "[";
	            	var cantidad = data.agendas.length;
	            	for (i in data.agendas) {
	            		a += "{\"id\":"+i+",\"text\": \""+data.agendas[i]['pacienteNombre']+" "+data.agendas[i]['pacienteApellido'] + "\", \"start_date\":\""+formatear(data.agendas[i]['fecha'])+" "+data.agendas[i]['hora'].substr(0,5) + "\", \"end_date\":\""+formatear(data.agendas[i]['fecha'])+" "+data.agendas[i]['hora'].substr(0,5) + "\"}";
	            		if ((Number(i)+1)  == cantidad){
	    	            	a += "]";
	            		}else{
	            			a += ",";
	            		}
	            	}
	          
	      	        scheduler.init('scheduler_here', new Date(),"month");
	                scheduler.parse(a, "json");//takes the name and format of the data source
	            },
	            error: function(data){
	            	var errors = data.responseJSON;
	                console.log(errors);
	            },

	        });
		
    });    
});

		function formatear(fecha){
			ano = fecha.substring(0,4);2017-96-13
			mes = fecha.substring(5,7);
			dia = fecha.substring(8,10);
			fecha_formateada = (mes+"/"+dia+"/"+ano);
			return fecha_formateada;
		}

</script>

@endsection