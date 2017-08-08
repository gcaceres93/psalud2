@extends('layouts.master')

@section('main_content')

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de seguimientos por plan</h1>
    <div class="alert alert-info">
 		 Para ver detalle del registro, hacer click encima de la fila.
	</div>
    <hr />
  </div>
  <div class="row">
  	<a href="{{ route('planTratamiento.show', $id)  }}" ><h2>Plan de tratamiento N° {{ $id }} </h2></a>
  	<br>
  	<a href="{{ url('/crearSeguimientoTratamiento/'.$id) }}" class="btn btn-success">Registrar nuevo seguimiento</a> 
  	<hr>
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Paciente</th>
	  					<th>Fecha</th>
	  					<th>Observaciones</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td class="clickable-row" data-href="{{ route('seguimiento.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('seguimiento.show', $row->id)  }}">{{ $row->pnombre }} {{ $row->papellido}} </td>
	  					<td class="clickable-row" data-href="{{ route('seguimiento.show', $row->id)  }}">{{ $row->fecha }} </td>
	  					<td class="clickable-row" data-href="{{ route('seguimiento.show', $row->id)  }}">{{ $row->observaciones }} </td>	
	  					<td>
	  						<center>
	  						<a href="{{ route('seguimiento.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('diagnostico.destroy', $row->id) }}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
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