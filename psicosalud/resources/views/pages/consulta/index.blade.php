@extends('layouts.master')

@section('main_content')

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de consultas</h1>
    <h4><a class="btn btn-success" href="{{ route('consulta.create') }}">Registrar nueva consulta</a></h4>
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
	  					<th>Fecha</th>
	  					<th>estado</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->pacienteNombre }} {{ $row->pacienteApellido }} </td>
	  					<td>{{ $row->medicoNombre }} {{ $row->medicoApellido }}</td>
	  					<td>{{ $row->fecha }}</td>
	  					<td>{{ $row->estado }}</td>
	  					<td>
	  						<a href="{{ route('consulta.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('consulta.destroy', $row->id) }}" method="post">
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