@extends('layouts.popup')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<form class="form-horizontal" action="/empleado/{{ $empleado->id }}" method="post"  id="contact_form">
{{ method_field('PUT') }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nombre" placeholder="Nombres" class="form-control" type="text" value="{{ $empleado->persona->nombre }}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="apellido" placeholder="Apellidos" class="form-control"  type="text" value="{{ $empleado->persona->apellido }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text" value="{{ $empleado->persona->cedula }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date" value="{{ $empleado->persona->nacimiento }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Código</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="codigo" placeholder="Código de empleado" class="form-control"  type="text" value="{{ $empleado->codigo }}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Dirección de correo" class="form-control"  type="text" value="{{ $empleado->persona->email }}" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text" value="{{ $empleado->persona->telefono }}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text" value="{{ $empleado->persona->direccion }}" readonly>
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Horario de disponibilidad</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"> Desde:  <i class="glyphicon glyphicon-calendar"></i></span>
  <input name="disponibilidad_desde" placeholder="Ej.:08:00:00" class="form-control"  type="text" value="{{ $empleado->disponibilidad_desde }}" readonly>
  <span class="input-group-addon">  Hasta:  <i class="glyphicon glyphicon-calendar"></i></span>
   <input name="disponibilidad_hasta" placeholder="Ej.:17:00:00" class="form-control"  type="text" value="{{ $empleado->disponibilidad_hasta }}" readonly>
    </div>
  </div>
</div>



<!-- Select Basic -->
  <div class="form-group"> 
    <label class="col-md-4 control-label">Cargo</label>
      <div class="col-md-4 inputGroupContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
        <input name="cargo" type="text" class="form-control" value="{{ $empleado->cargo->descripcion }}" readonly>
    </div>
  </div>
  </div>

  <div class="form-group">
  <label class="col-md-4 control-label" >¿Es médico?</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
   <div class="checkbox">
   @if($empleado->es_medico)
       <label><input type="checkbox" name="es_medico" value="1" checked disabled></label>
   @else
      <label><input type="checkbox" name="es_medico" value="" disabled></label>
   @endif
    </div>
  </div>
</div>
</div>



</fieldset>
</form>
</div>

@endsection