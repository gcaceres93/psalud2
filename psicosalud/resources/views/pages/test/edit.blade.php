@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de tipos de terapias</h1>
    <h4><a href="{{ route('tipoTerapia.index') }}">Listar tipos de terapias</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/tipoTerapia/{{ $tipoTerapia->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" class="form-control" placeholder="Nombre del tipo de terapia" value="{{ $tipoTerapia->nombre }}">		
      <br/>
  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection