@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Edición de Impuestos</h1>
    <h4><a href="{{ route('impuestos.index') }}">Listar Impuestos</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/impuestos/{{ $impuestos->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" required name="nombre" class="form-control" placeholder="Nombre del impuesto" value="{{ $impuestos->nombre }}">		

  		<div class="form-group">
  			<label for="porcentaje">Porcentaje</label>
  			<input type="text" required name="porcentaje" class="form-control" placeholder="Porcentaje del impuesto" value="{{ $impuestos->porcentaje }}"> 	
  		</div>


  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection