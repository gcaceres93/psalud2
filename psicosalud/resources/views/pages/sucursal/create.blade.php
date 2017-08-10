@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Registro de Sucursales</h1>
    <h4><a href="{{ route('sucursal.index') }}">Listar sucursales</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/sucursal">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" required class="form-control" placeholder="Nombre de la sucursal">		 	
  		<div class="form-group">
  			<label for="direcci&oacute;n">Direcci&oacute;n</label>
  			<input type="text" name="direccion" required class="form-control" placeholder="Direcci&oacute;n de la sucursal"> 	
  		</div>
      <div class="form-group">
        <label for="telefono">Teléfono</label>
        <input type="text" name="telefono" required class="form-control" placeholder="Número de teléfono de la sucursal">   
      </div>

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection