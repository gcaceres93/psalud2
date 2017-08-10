@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    <h1>Lista de Facturas</h1>
    <h4><a class="btn btn-success" href="{{ route('factura.create') }}">Registrar nueva factura</a></h4>
    
     <div class="alert alert-info">
 		 Para imprimir la factura, hacer click encima de la fila.
	</div><hr />
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
	  					<th>Estado</th>
	  					<th>Acciones</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as  $row)
	  				<tr>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->nombre }} {{ $row->apellido }}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->razon_social }}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->ruc }}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->nro }}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->fecha}}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->monto_total}}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->tipo_pago}}</td>
	  					<td class="clickable-row" data-href="{{ route('factura.show', $row->id)  }}">{{ $row->estado}}</td>
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