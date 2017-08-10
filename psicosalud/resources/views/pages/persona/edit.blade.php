@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style> --}}

<form class="form-horizontal" action="/persona/{{ $persona->id }}" method="post"  id="contact_form">
{{ method_field('PUT') }}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<fieldset>



<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nombre</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required  name="nombre" placeholder="Nombres" class="form-control"  type="text" value="{{$persona->nombre}}">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Apellido</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required name="apellido" placeholder="Apellidos" class="form-control"  type="text" value="{{$persona->apellido}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >C&eacute;dula</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input required name="cedula" placeholder="Cédula de identidad" class="form-control"  type="text" value="{{$persona->cedula}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >Fecha de nacimiento</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input required name="nacimiento" placeholder="Fecha y año de nacimiento" class="form-control"  type="date" value="{{$persona->nacimiento}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Lugar de nacimiento</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input required name="lugar_nacimiento" placeholder="Lugar de nacimiento" class="form-control" type="text" value="{{$persona->lugar_nacimiento}}">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input required name="email" placeholder="Dirección de correo" class="form-control"  type="text" value="{{$persona->email}}">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Teléfono</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input required name="telefono" placeholder="Ej.:(0961)555-1212" class="form-control" type="text" value="{{$persona->telefono}}">
    </div>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Dirección</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input  required name="direccion" placeholder="Dirección particular y/o profesional" class="form-control" type="text" value="{{$persona->direccion}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Colegio</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="colegio" placeholder="Colegio donde se realizaron los estudios primarios/secundarios" class="form-control" type="text" value="{{$persona->colegio}}">
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label">Grado</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="grado" placeholder="Grado" class="form-control" type="text" value="{{$persona->grado}}">
    </div>
  </div>
</div>

 <div class="form-group"> 
    <label class="col-md-4 control-label">Ocupación</label>
      <div class="col-md-4 selectContainer">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
      <select name="ocupacion" class="form-control selectpicker">
        <option value="{{ $persona->ocupacion->id }}" >{{$persona->ocupacion->nombre}}</option>
        
      </select>
    </div>
  </div>
  </div>


<center><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Actualizar</button> </center>

</fieldset>
</form>
</div>

@endsection