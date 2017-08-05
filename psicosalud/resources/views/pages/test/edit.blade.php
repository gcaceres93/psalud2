@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Edición de test</h1>
    <h4><a href="{{ route('test.index') }}">Listar Tests</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/test/{{ $test->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
  			<label for="nombre">Nombre</label>
  			<input type="text" name="nombre" class="form-control" placeholder="Nombre del test" value="{{ $test->nombre }}">		
      <br/>
      <div class="form-group">
              @php
              		$var='';
              		if ($test->abstracto == True)
              			{
              				$var='checked';
              			}
              @endphp
  			<label for="abstracto">Es abstracto?</label>
  			<input type="checkbox" @php echo($var) @endphp name="abstracto"   value="{{ $test->abstracto }}">		
      <br/>
  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection