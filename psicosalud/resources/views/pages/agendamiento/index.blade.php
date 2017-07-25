@extends('layouts.master')

@section('main_content')

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
	  					<th>Paciente</th>
	  					<th>Médico</th>
	  					<th>Modalidad</th>
	  					<th>Sucursal</th>
	  					<th>Fecha</th>
	  					<th>Hora</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->pacienteNombre }} {{ $row->pacienteApellido }} </td>
	  					<td>{{ $row->medicoNombre }} {{ $row->medicoApellido }}</td>
	  					<td>{{ $row->modalidad}}</td>
	  					<td>{{ $row->sucursal }}</td>
	  					<td>{{ $row->fecha_programada }}</td>
	  					<td>{{ $row->hora_programada }}</td>
	  					<td>
	  						<a href="{{ route('agendamiento.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('agendamiento.destroy', $row->id) }}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>	  					
						</td>
	  				</tr>	
	  			@endforeach	
	  			</tbody>
  			</table>
  		@endif
  	</div>
  </div>
</div>

@endsection