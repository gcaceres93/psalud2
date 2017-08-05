@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
  <div class="row">
    <h1>Registro de Usuarios</h1>
    <h4><a href="{{ route('user.index') }}">Listar usuarios</a></h4>
    <hr />
  </div>
  <div class="row">
    <div class="col-md-6">
  	<form method="post" action="/user">
  		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group"> 
      <label>Empleado</label>
       
      <select  name="persona" id="persona" class="form-control selectpicker">
        <option value="" >Seleccionar empleado</option>
        @foreach($personas as $persona)
          <option   value="{{ $persona->id }}">{{ $persona->apellido }}, {{ $persona->nombre}} </option>
        @endforeach
      </select>
    
  
  	</div>
  			
  		<div class="form-group">
  			<label for="descripci&oacute;n">Nombre</label>
  			<input type="text" name="name" id="name" class="form-control" placeholder="Nombre del Usuario"> 	
  		</div>
      <div class="form-group">
        <label for="E-mai">E-mail</label>
        <input type="text" name="email" class="form-control" placeholder="E-mail del Usuario">   
      </div>
      <div class="form-group">
        <label for="Contraseña">Contraseña</label>
        <input type="password" " name="password" class="form-control" placeholder="Contraseña del Usuario">   
      </div>
      
      <div class="form-group"> 
      <label> Seleccionar Roles</label>
       
		<br/>
        @foreach($roles as $rol)
         <input type="checkbox" name="roles[]" id = "roles" value="{{ $rol->id }}" />{{ $rol->nombre }}<br />
          
        @endforeach
    
    
  
  	</div>

  		<button type="submit" class="btn btn-info">Guardar</button>
  	</form>	
    </div>
  </div>
</div>
<script type="text/javascript">
// $(document).ready(function() {	
//     $('#name').on('click', function () {
//     	var rol=[]
//         	rol= $('#roles').val();
//     	console.log (rol); 
        
//     });
// });
</script>
@endsection