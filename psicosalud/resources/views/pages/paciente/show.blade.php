@extends('layouts.popup')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<form class="form-horizontal" action="/paciente/{{ $paciente->id }}" method="post"  id="contact_form">
{{ method_field('PUT') }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nombre" placeholder="Nombres" class="form-control" type="text" value="{{ $paciente->persona->nombre }}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="apellido" placeholder="Apellidos" class="form-control"  type="text" value="{{ $paciente->persona->apellido }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text" value="{{ $paciente->persona->cedula }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date" value="{{ $paciente->persona->nacimiento }}" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >RUC</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="ruc" placeholder="RUC del paciente" class="form-control"  type="text" value="{{$paciente->ruc }}" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Razón social</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-ok-sign"></i></span>
  <input name="razon_social" placeholder="Razón social del paciente" class="form-control"  type="text" value="{{$paciente->razon_social}}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Dirección de correo" class="form-control"  type="text" value="{{ $paciente->persona->email }}" readonly>
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text" value="{{ $paciente->persona->telefono }}" readonly>
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text" value="{{ $paciente->persona->direccion }}" readonly>
    </div>
  </div>
</div>





</fieldset>
</form>
</div>

@endsection