@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de modalidades</h1>
    <h4><a href="{{ route('modalidad.index') }}">Listar modalidades</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/modalidad">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Descripci&oacute;n</label>
  			<input type="text" required name="descripcion" class="form-control" placeholder="Nombre de la modalidad">		 	
  	   
      <br /> 
  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection