@extends('layouts.master')

@section('main_content')

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de Conceptos de Factura</h1>
    <h4><a class="btn btn-success" href="{{ route('facturaconcepto.create') }}">Registrar nuevo concepto</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Descripcion</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->descripcion }}</td>
	  					<td>
	  					<center>
	  						<a href="{{ route('facturaconcepto.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('facturaconcepto.destroy', $row->id) }}" method="post">
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