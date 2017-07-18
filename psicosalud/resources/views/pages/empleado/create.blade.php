@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}
<script type="text/javascript">
  $(document).ready(function(){
    $("p").click(function(){
        $(this).hide();
    });
});
</script>

<form class="form-horizontal" action="/empleado" method="post"userd="contact_form">
<center><img class="img-responsive" src="/img/user.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
<center><h2 >Registro de empleados</h2></center>
<br />
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nombre" placeholder="Nombres" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="apellido" placeholder="Apellidos" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Código</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="codigo" placeholder="Código de empleado" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Dirección de correo" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Horario de disponibilidad</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"> Desde:  <i class="glyphicon glyphicon-calendar"></i></span>
  <input name="disponibilidad_desde" placeholder="Ej.:08:00:00" class="form-control"  type="text">
  <span class="input-group-addon">  Hasta:  <i class="glyphicon glyphicon-calendar"></i></span>
   <input name="disponibilidad_hasta" placeholder="Ej.:17:00:00" class="form-control"  type="text">
    </div>
  </div>
</div>



<!-- Select Basic -->
@if(Route::currentRouteName() == 'medico.create')
  @if($profesionales_salud)
  <div class="form-group"> 
    <label class="col-md-4 control-label">Cargo</label>
      <div class="col-md-4 selectContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
      <select name="cargo" class="form-control selectpicker">
        <option value="" >Seleccionar cargo</option>
        @foreach($profesionales_salud as $cargo)
          <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
        @endforeach
      </select>
    </div>
  </div>
  </div>
  @endif
@else
@if($cargos)   
  <div class="form-group"> 
    <label class="col-md-4 control-label">Cargo</label>
      <div class="col-md-4 selectContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
      <select name="cargo" class="form-control selectpicker" >
        <option value=" " >Seleccionar cargo</option>
        @foreach($cargos as $cargo)
          <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
        @endforeach
      </select>
    </div>
  </div>
  </div>
@endif
@endif

<div class="form-group">
  <label class="col-md-4 control-label" >¿Es médico?</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
   <div class="checkbox">
   @if(Route::currentRouteName() == 'medico.create')
      <label><input id="es_medico" type="checkbox" name="es_medico" value="1" checked readonly></label>
   @else
      <label><input id="es_medico" type="checkbox" name="es_medico" value="1"></label>  
   @endif
    </div>
  </div>
</div>
</div>

{{-- <div class="form-group">

  <div class="checkbox">
  <label><input type="checkbox" value="">¿Es médico?</label>
</div>
</div> --}}




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <center><button type="submit" class="btn btn-success" >Guardar <span class="glyphicon glyphicon-send"></span></button></center>
  </div>
</div>

</fieldset>
</form>
</div>
@endsection