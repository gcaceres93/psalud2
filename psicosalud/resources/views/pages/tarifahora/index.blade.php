@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
   
</style> --}}

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de Tarifas</h1>
    <h4><a class="btn btn-success" href="{{ route('tarifaHora.create') }}">Registrar nueva Tarifa</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr>
	  					<th>ID</th>
	  					<th>Medico</th>
	  					<th>Modalidad</th>
	  					<th>Codigo</th>
	  					<th>Tarifa</th>
	  					<th>Accion</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->nombre }} {{ $row->apellido }}</td>
	  					<td>{{ $row->descripcion }}</td>
	  					<td>{{ $row->codigo }}</td>
	  					<td>{{ $row->tarifa }}</td>
	  					<td>
	  					<center>
	  						<a href="{{ route('tarifaHora.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('tarifaHora.destroy', $row->id) }}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</center>	  					
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