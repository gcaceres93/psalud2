@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Roles</h1>
    <h4><a href="{{ route('rol.index') }}">Listar Roles</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/rol">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		
  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" required name="nombre" class="form-control" placeholder="Nombre del Rol"> 	
  		</div>

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection