@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    <h1>Lista de test aplicados</h1>
    <h4><a  class="btn btn-success" href="{{ route('aplicarTest.create') }}">Aplicar Nuevo Test</a></h4>
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
	  					<th>Test</th>
	  					<th>Tipo Aplicacion</th>
	  					<th>Fecha</th>
	  					<th>Accion</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  				@php
	  					if($row->tipo_aplicacion == 1 ){
	  						$tipo='Diagnostico';
	  					}
	  					else{
	  						$tipo='Tratamiento';
	  					}
	  				@endphp
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->pnombre }} {{ $row->papellido }}</td>
	  					<td>{{ $row->tnombre }}</td>
	  					<td>{{ $tipo }}</td>
	  					<td>{{ $row->fecha }}</td>
	  					<td>
	  						<a href="{{ route('aplicarTest.edit', $row->id) }}" class="btn btn-info">Editar</a>
	  						<a href="{{ route('aplicarTest.show', $row->id) }}" class="btn btn-warning">Ver</a>
							<form action="{{ route('aplicarTest.destroy', $row->id) }}" method="post">
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