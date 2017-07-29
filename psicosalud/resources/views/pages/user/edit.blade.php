@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<div class="container">
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
  		<select name="persona" class="form-control selectpicker">
        <option value="" >Seleccionar empleado</option>
        @foreach($personas as $persona)
        	<?php
                             $selected = ""
                            
                         ?>
                	@if ($persona->id == $user->empleado_id)
                    	 <?php
                             $selected = "selected"
                         ?>
         			@endif
        
          <option <?php echo ($selected) ?>     value="{{ $persona->id }}">{{ $persona->apellido }} {{ $persona->nombre}}  </option>
        @endforeach
      </select>
    
  
  </div>
  		

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
  		 <div class="form-group"> 
      <label >Roles</label>
       
<br />

<!-- Aqui se hace el foreach de los roles. La variable role es el rol que trae de la tabla roles .
        Se setea una variable checked en false para utilizar luego en caso de el usuario no tenga ese rol-->
		@foreach ($roles as $role)
		 <?php
                         $checked = ""
                     ?>
<!--                      Aqui ya se hace el foreach de los roles por usuario! En el segundo foreach se verifica si el usuario tiene ese rol 
                                La variable usua es la variable de la tabla usuarios_por_rol y en caso de que exista el rol para ese usuario se setea la variable  checked a checked que luego se usa en el input -->
         @foreach($roles_list as $rol) 
         
            
         	@foreach($rol->roles as $usua)
         	
         		@if($usua->id ==$role->id )
         		 <?php
                         $checked = "checked"
                        
                     ?>
                 	
                        
         		@endif
          		 
			
         	@endforeach
         	
         @endforeach
          
     	<input type="checkbox" name="lista[]" <?php echo ($checked) ?>  value="{{ $role->id }}" />{{ $role->nombre }}<br />
      @endforeach 

    
    
  
  	</div>

  		<button type="submit" class="btn btn-success">Actualizar</button>
  	</form>	
    </div>
  </div>
</div>

@endsection