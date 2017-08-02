@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de pregunta de Anamnesis</h1>
    <h4><a  class="btn btn-warning" href="{{ route('cuestionarioAnamnesis.index') }}">Listar preguntas de cuestionario de anamnesis</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/cuestionarioAnamnesis/{{ $cuestionario->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  	<div class="form-group">
  			<label for="pregunta">Nombre de la pregunta</label>
  			<input type="text" name="pregunta" value="{{ $cuestionario->pregunta }}" class="form-control" placeholder="Nombre de la pregunta a ser mostrada en el cuestionario de anamnesis">		 	
  	    </div>
  	    <div class="form-group">
  			<label for="nombre">Aclaración de la pregunta</label>
  			<textarea name="aclaracion_pregunta"  class="form-control" placeholder="Nombre de la pregunta a ser mostrada en el cuestionario de anamnesis" rows="5">{{ $cuestionario->aclaracion_pregunta }} </textarea>		 	
  	    </div>
  	    <div class="form-group">
  			<label for="grupo">Grupo</label>
  			<input type="text" name="grupo" value="{{ $cuestionario->grupo }}" class="form-control" placeholder="Ejemplo: ANTECEDENTES FAMILIARES, DESARROLLO, ETC.">		 	
  	    </div>
  	    <div class="form-group">
  			<label for="orden">Orden de aparición</label>
  			<span class="help-block">Por defecto se guardará como último en el orden de aparición. <strong>Último utilizado:</strong> {{ $ultimo }}</span>
  			<input type="number" value="{{ $cuestionario->orden }}"  name="orden" class="form-control" placeholder="Orden de aparición en cuestionario de Anamnesis">		 	
  	    </div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection