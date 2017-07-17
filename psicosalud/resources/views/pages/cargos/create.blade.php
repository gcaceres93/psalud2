@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Cargos</h1>
    <h4><a href="{{ route('cargo.index') }}">Listar cargos</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/cargo">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  			
  		<div class="form-group">
  			<label for="descripci&oacute;n">Descripci&oacute;n</label>
  			<input type="text" name="descripcion" class="form-control" placeholder="Descripci&oacute;n del cargo"> 	
  		</div>

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection