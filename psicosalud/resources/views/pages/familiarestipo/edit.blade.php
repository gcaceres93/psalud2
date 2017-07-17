@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de Tipo de Familiar</h1>
    <h4><a href="{{ route('tipoFamiliar.index') }}">Listar Tipo de Familiar</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/tipoFamiliar/{{ $familiarestipo->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">


  		<div class="form-group">
  			<label for="Tipo de Familiar">Tipo de Familiar</label>
  			<input type="text" name="nombre" class="form-control" placeholder="Tipo de Familiar" value="{{ $familiarestipo->nombre }}"> 	
  		</div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection