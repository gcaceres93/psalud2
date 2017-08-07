@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}
<center><img class="img-responsive" src="/img/ficha.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
<center><h2 >Anamnesis clínica</h2></center>
<br />
<div class="row">
    <div class="col-md-12">
    	<div class="btn-group">
    		<a href="{{ url('/imprimirAnamnesis/'.$anamnesis->id) }}" class="btn btn-danger btn-group"><span class="glyphicon glyphicon-download-alt"></span> Imprimir anamnesis</a>
   			@if(count($diagnostico)>0)
   			<a href="{{ url('/diagnostico/'.$diagnostico->id) }}" class="btn btn-warning btn-group"><span class="glyphicon glyphicon-file"></span> Ver diagnóstico</a>
   			<a href="{{ url('/diagnostico/'.$diagnostico->id.'/edit') }}" class="btn btn-info btn-group"><span class="glyphicon glyphicon-file"></span> Editar diagnóstico</a>
   			@else
   			<a href="{{ url('/diagnosticoAnamnesis/'.$anamnesis->id) }}" class="btn btn-warning btn-group"><span class="glyphicon glyphicon-file"></span> Registrar diagnóstico</a>
   			@endif
   		</div>
    </div>
</div>
<fieldset>
<h2>Identificaci&oacute;n del paciente</h2>
<hr>
@if($paciente)
<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="paciente">Paciente:</label>
			<a href="{{url('/paciente/'.$paciente->id.'/edit') }}" >{{$paciente->id }} - {{$paciente->nombre}}  {{$paciente->apellido}} </a>
			<input type="hidden" name="paciente_id" value="{{ $paciente->id }}"/>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-md-6">
		<div class="form-group"> 
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" value="{{ $paciente->nombre }}" id="nombre" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group"> 
			<label for="apellido">Apellido</label>
			<input type="text" class="form-control" value="{{ $paciente->apellido }}" id="apellido" disabled>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group"> 
			<label for="nombre">Fecha de nacimiento</label>
			<input type="text" class="form-control"  name="nacimiento" value="{{ $paciente->nacimiento }}" id="nacimiento" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group"> 
			<label for="apellido">Lugar de nacimiento</label>
			<input type="text" class="form-control" name="lugar_nacimiento" value="{{ $paciente->lugar_nacimiento }}" id="lugar_nacimiento" disabled>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="informantes">Informantes</label>
			<textarea disabled class="form-control"  name="informantes" id="informantes" rows="4">{{ $anamnesis->informantes }}</textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="motivo_consulta">Motivo de consulta</label>
			<textarea disabled class="form-control"  name="motivo_consulta" id="motivo_consulta" rows="5">{{$anamnesis->motivo }}</textarea>
		</div>
	</div>
</div>
@php 
$aux = 'asd'; 
@endphp

@foreach($respuestas as $r)
	<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			@unless($r->grupo == $aux)
				<h3>{{ $r->grupo }} </h3>
				<hr/>
				@php
					$aux = $r->grupo;
				@endphp
			@endunless			
			<label for="{{ $r->pregunta }}">{{ $r->pregunta}} </label> 
			@if(!empty($r->aclaracion_pregunta))
						({{ $r->aclaracion_pregunta }})
			@endif
			<textarea disabled class="form-control"   rows="5">{{$r->respuesta }}</textarea>
		</div>
	</div>
</div>
@endforeach

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="observacion">Observaciones del entrevistador</label>
			<textarea disabled class="form-control" name="observacion" id="observacion" rows="5">{{$anamnesis->observacion}}</textarea>
		</div>
	</div>
</div>



</fieldset>
</form>
</div>

<script type="text/javascript">

$(document).ready(function() {	
    
});



</script>


@endsection