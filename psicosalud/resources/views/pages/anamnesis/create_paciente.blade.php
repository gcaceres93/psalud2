@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}
<form class="form-horizontal" id="form" action="/anamnesis" method="post" userd="contact_form">
<center><img class="img-responsive" src="/img/ficha.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
<center><h2 >Anamnesis clínica</h2></center>
<br />
<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
@endif

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="informantes">Informantes</label>
			<textarea class="form-control"  name="informantes" id="informantes" rows="4"></textarea>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="motivo_consulta">Motivo de consulta</label>
			<textarea class="form-control"  name="motivo_consulta" id="motivo_consulta" rows="5"></textarea>
		</div>
	</div>
</div>
@php 
$aux = 'asd'; 
@endphp

@foreach($cuestionario as $c)
	<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			@unless($c->grupo == $aux)
				<h3>{{ $c->grupo }} </h3>
				<hr/>
				@php
					$aux = $c->grupo;
				@endphp
			@endunless			
			<label for="{{ $c->pregunta }}">{{ $c->pregunta}} </label> 
			@if(!empty($c->aclaracion_pregunta))
						({{ $c->aclaracion_pregunta }})
			@endif
			<textarea class="form-control"  name="cuestionario{{ $c->id}}" id="cuestionario{{ $c->id}}" rows="5"></textarea>
		</div>
	</div>
</div>
@endforeach

<div class="row">
	<div class="col-md-12">
		<div class="form-group"> 
			<label for="observacion">Observaciones del entrevistador</label>
			<textarea class="form-control" name="observacion" id="observacion" rows="5"></textarea>
		</div>
	</div>
</div>

<!-- Button -->
<div class="form-group">
    <center><button type="submit" class="btn btn-success" >Guardar <span class="glyphicon glyphicon-send"></span></button></center>
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