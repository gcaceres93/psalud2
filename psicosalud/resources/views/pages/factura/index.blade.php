@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    <h1>Lista de Facturas</h1>
    <h4><a class="btn btn-success" href="{{ route('factura.create') }}">Registrar nueva factura</a></h4>
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
	  					<th>Razon Social</th>
	  					<th>Ruc</th>
	  					<th>Numero</th>
	  					<th>Fecha</th>
	  					<th>Monto Total</th>
	  					<th>Tipo de Factura</th>
	  					<th>Acciones</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->nombre }} {{ $row->apellido }}</td>
	  					<td>{{ $row->razon_social }}</td>
	  					<td>{{ $row->ruc }}</td>
	  					<td>{{ $row->nro }}</td>
	  					<td>{{ $row->fecha}}</td>
	  					<td>{{ $row->monto_total}}</td>
	  					<td>{{ $row->tipo_pago}}</td>
	  					<td>
	  					<center>
	  						<a href="{{ route('factura.edit', $row->id) }}" class="btn btn-info">Editar</a></br>
<!-- 	  						<a class="btn btn-success" href="{{ URL('/factura/'.$row->id.'/edit#Cobro') }}"> Cobrar </a> -->
	  						<a href="{{ route('cobro.create', $row->id) }}" class="btn btn-success">Cobrar</a>
							<form action="{{ route('factura.destroy', $row->id) }}" method="post">
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