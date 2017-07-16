@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Edición de ocupaciones</h1>
    <h4><a href="{{ route('ocupacion.index') }}">Listar ocupaciones</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/ocupacion/{{ $ocupacion->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" class="form-control" placeholder="Nombre de la ocupaci&oacute;n" value="{{ $ocupacion->nombre }}">		

  		<div class="form-group">
  			<label for="descripci&oacute;n">Descripci&oacute;n</label>
  			<input type="text" name="descripcion" class="form-control" placeholder="Descripci&oacute;n de la ocupaci&oacute;n" value="{{ $ocupacion->descripcion }}"> 	
  		</div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection