@extends('layouts.master')

@section('main_content')


<div class="container">
  <div class="row">
    <h1>Lista de test</h1>
    <h4><a class="btn btn-success" href="{{ route('test.create') }}">Registrar nuevo test</a></h4>
     <div class="alert alert-info">
 		 Para ver detalle del registro, hacer click encima de la fila.
	</div>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>Abstracto</th>
	  					<th>Acciones</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
					@php 
						if   ($row->abstracto == True){
								$abst='SI';		
						} 
						else{
							$abst='NO';
							
							}
					@endphp	  				
	  					<td class="clickable-row" data-href="{{ route('test.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('test.show', $row->id)  }}">{{ $row->nombre }}</td>
	  					<td class="clickable-row" data-href="{{ route('test.show', $row->id)  }}">{{ $abst }}</td>
	  					<td>
	  						<center>
	  						<a href="{{ route('test.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('test.destroy', $row->id) }}" method="post">
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