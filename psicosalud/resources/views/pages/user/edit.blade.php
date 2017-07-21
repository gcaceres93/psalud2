@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container-fluid">
  <div class="row">
    <h1>Edición de Usuarios</h1>
    <h4><a href="{{ route('user.index') }}">Listar Usuarios</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/user/{{ $user->id }}">
      {{ method_field('PUT') }}
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

  		<div class="form-group">
        <label for="descripci&oacute;n">Nombre</label>
        <input type="text" name="name" class="form-control" placeholder="Nombre del Usuario" value="{{ $user->name }}">   
      </div>
      <div class="form-group">
        <label for="E-mai">E-mail</label>
        <input type="text" name="email" class="form-control" placeholder="E-mail del Usuario" value="{{ $user->email }}">   
      </div>
      <div class="form-group">
        <label for="Contraseña">Contraseña</label>
        <input type="password" " name="password" class="form-control" placeholder="Contraseña del Usuario" value="{{ $user->password }}">   
      </div>
  		

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection