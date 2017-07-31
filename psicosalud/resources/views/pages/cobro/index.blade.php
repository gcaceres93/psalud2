@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    <h1>Lista de cobros</h1>
<!--     <h4><a class="btn btn-success" href="{{ route('cobro.create') }}">Registrar nuevo cargo</a></h4> -->
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Factura Nro</th>
	  					<th>Razon Social</th>
	  					<th>Ruc</th>
	  					<th>Monto</th>
	  					<th>Tipo de Pago</th>
	  					<th>Observaciones</th>
	  					<th>Acciones</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				@if($row->tipo_pago ==1)
	  					<?php 
	  					        $pago=	'Efectivo';
	  					?>
	  				@elseif( $row->tipo_pago ==2)
	  						<?php 
	  					        $pago =	'Tarjeta de Credito';
	  					       ?>
	  				@elseif( $row->tipo_pago ==3)
	  						<?php 
	  					        $pago =	'Tarjeta de Debito';
	  					       ?>
	  				@elseif( $row->tipo_pago ==4)
	  						<?php 
	  					        $pago =	'Cheque';
	  					       ?>
	  				@endif
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->nro }}</td>
	  					<td>{{ $row->razon_social }}</td>
	  					<td>{{ $row->ruc }}</td>
	  					<td>{{ $row->monto }}</td>
	  					<td><?php echo ($pago) ?></td>
	  					<td>{{ $row->observacion }}</td>
	  					<td>
	  					<center>
	  						<a href="{{ route('cobro.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('cobro.destroy', $row->id) }}" method="post">
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