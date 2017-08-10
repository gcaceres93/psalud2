@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}
<form class="form-horizontal" action="/persona" method="post" userd="contact_form">
<center><img class="img-responsive" src="/img/paciente.png" alt="Logo" width="8%" height="8%" class="img-responsive"></center>
<center><h2 >Registro de personas</h2></center>
<br />
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required  name="nombre" placeholder="Nombres" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required name="apellido" placeholder="Apellidos" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input required name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Lugar de nacimiento</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input required name="lugar_nacimiento" placeholder="Lugar de nacimiento" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input  required name="email" placeholder="Dirección de correo" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input required name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input required name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Colegio</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="colegio" placeholder="Colegio donde se realizaron los estudios primarios/secundarios" class="form-control" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Grado</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="grado" placeholder="Grado" class="form-control" type="text">
    </div>
  </div>
</div>

 <div class="form-group"> 
    <label class="col-md-4 control-label">Ocupación</label>
      <div class="col-md-4 selectContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
      <select name="ocupacion" class="form-control selectpicker">
        <option value="" >--- Seleccionar ocupacion ---</option>
        @foreach($ocupaciones as $ocupacion)
          <option value="{{ $ocupacion->id }}">{{ $ocupacion->nombre }}</option>
        @endforeach
      </select>
    </div>
  </div>
  </div>

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