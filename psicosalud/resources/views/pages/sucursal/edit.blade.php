@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Edición de sucursales</h1>
    <h4><a href="{{ route('sucursal.index') }}">Listar sucursales</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/sucursal/{{ $sucursal->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" required class="form-control" placeholder="Nombre de la sucursal" value="{{ $sucursal->nombre }}">		

  		<div class="form-group">
  			<label for="dirección">Dirección</label>
  			<input type="text" name="direccion" required class="form-control" placeholder="Dirección de la Sucursal" value="{{ $sucursal->direccion }}"> 	
  		</div>

      <div class="form-group">
        <label for="teléfono">Teléfono</label>
        <input type="text" name="telefono" required class="form-control" placeholder="Número de teléfono de la Sucursal" value="{{ $sucursal->telefono }}">   
      </div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection