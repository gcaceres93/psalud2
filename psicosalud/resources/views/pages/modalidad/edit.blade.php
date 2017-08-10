@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de modalidades</h1>
    <h4><a href="{{ route('modalidad.index') }}">Listar modalidades</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/modalidad/{{ $modalidad->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="descripci&oacute;n">Descripci&oacute;n</label>
  			<input type="text" required name="descripcion" class="form-control" placeholder="Descripci&oacute;n de la modalidad" value="{{ $modalidad->descripcion }}"> 	
  		</div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection