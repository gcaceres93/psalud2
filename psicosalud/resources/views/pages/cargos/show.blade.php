@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1> Cargos</h1>
  
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/cargo/{{ $cargos->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		
  		<div class="form-group">
  			<label for="descripci&oacute;n">Descripci&oacute;n</label>
  			<input type="text" name="descripcion" class="form-control"   placeholder="Descripci&oacute;n del cargo" value="{{ $cargos->descripcion }}" disabled> 	
  		</div>

      <div class="form-group">
      <div class="checkbox">
         @if($cargos->profesional_salud)
            <label><input type="checkbox" disabled name="profesional_salud" value="1" checked>Es profesional de la salud?</label>
         @else
            <label><input type="checkbox" disabled name="profesional_salud" value="1" >Es profesional de la salud?</label>
         @endif
      </div>
      </div>

<!--   		<button type="submit" class="btn btn-success">Actualizar</button> -->
  	</form>	
    </div>
  </div>
</div>

@endsection