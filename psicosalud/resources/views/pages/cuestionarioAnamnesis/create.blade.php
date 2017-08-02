@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de preguntas para cuestionario de Anamnesis</h1>
    <h4><a class="btn btn-warning" href="{{ route('cuestionarioAnamnesis.index') }}">Listar preguntas de cuestionario Anamnesis</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/cuestionarioAnamnesis">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="pregunta">Nombre de la pregunta</label>
  			<input type="text" name="pregunta" class="form-control" placeholder="Nombre de la pregunta a ser mostrada en el cuestionario de anamnesis">		 	
  	    </div>
  	    <div class="form-group">
  			<label for="nombre">Aclaración de la pregunta</label>
  			<textarea name="aclaracion_pregunta" class="form-control" placeholder="Nombre de la pregunta a ser mostrada en el cuestionario de anamnesis" rows="5"> </textarea>		 	
  	    </div>
  	    <div class="form-group">
  			<label for="grupo">Grupo</label>
  			<input type="text" name="grupo" class="form-control" placeholder="Ejemplo: ANTECEDENTES FAMILIARES, DESARROLLO, ETC.">		 	
  	    </div>
  	    <div class="form-group">
  			<label for="orden">Orden de aparición</label>
  			<span class="help-block">Por defecto se guardará como último en el orden de aparición. <strong>Último utilizado:</strong> {{ $ultimo }}</span>
  			<input type="number" name="orden" class="form-control" placeholder="Orden de aparición en cuestionario de Anamnesis">		 	
  	    </div>
      <br /> 
      
  		<button type="submit" class="btn btn-success">Guardar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection