@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
    th{
    	background-color: #819FF7;
    }
</style> --}}

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de agendamientos</h1>
    <h4><a class="btn btn-success" href="{{ route('agendamiento.create') }}">Registrar nuevo agendamiento</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Descripci&oacute;n</th>
	  					<th>Paciente</th>
	  					<th>Modalidad</th>
	  					<th>Sucursal</th>
	  					<th>Fecha</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->descripcion }}</td>
	  					<td>{{ $row->paciente->nombre }}</td>
	  					<td>{{ $row->modalidad->descripcion }}</td>
	  					<td>{{ $row->sucursal->nombre }}</td>
	  					<td>{{ $row->fecha_programada }}</td>
	  					<td>
	  						<a href="{{ route('agendamiento.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('agendamiento.destroy', $row->id) }}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>	  					
						</td>
	  				</tr>	
	  			</tbody>
	  			@endforeach	
  			</table>
  		@endif
  	</div>
  </div>
</div>

@endsection