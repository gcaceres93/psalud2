@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de agendamiento</h1>
    <h4><a href="{{ route('agendamiento.index') }}">Listar agendamientos</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/agendamiento">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			 <label for="paciente">Paciente</label>
  			 <br/>
  			<div class="col-md-5">
  			<select name="paciente" class="form-control selectpicker">
                <option value="" >--- Seleccionar paciente ---</option>
                @foreach($pacientes as $paciente)
                  <option value="{{ $paciente->id }}">{{ $paciente->nombre }}  {{ $paciente->apellido }}</option>
                @endforeach
             </select>
             </div>
             <div class="col-md-5"><a href="{{ route('paciente.create') }}">Crear nuevo paciente</a></div>
  		</div>
  		<br/>
  		<br/>
  		<div class="form-group">
  			 <label for="paciente">Modalidad de consulta</label>
  			 <br/>
  			
  			<select name="paciente" class="form-control selectpicker">
                <option value="" >--- Seleccionar modalidad ---</option>
                @foreach($modalidades as $modalidad)
                  <option value="{{ $modalidad->id }}">{{ $modalidad->descripcion }}</option>
                @endforeach
             </select>
  		</div>
  		
  		<div class="form-group">
  			 <label for="paciente">Sucursal</label>
  			 <br/>
  			
  			<select name="paciente" class="form-control selectpicker">
                <option value="" >--- Seleccionar sucursal ---</option>
                @foreach($sucursales as $sucursal)
                  <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                @endforeach
             </select>
  		</div>

      
  </div>
</div>
</div>

@endsection
