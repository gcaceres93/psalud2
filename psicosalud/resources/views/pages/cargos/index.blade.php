@extends('layouts.master')

@section('main_content')
<style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
    th{
    	background-color: #819FF7;
    }
</style>

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de cargos</h1>
    <h4><a href="{{ route('cargo.create') }}">Registrar nuevo cargo</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table class="table table-hover table-bordered table-condensed">
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
	  						<a href="{{ route('cargo.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('cargo.destroy', $row->id) }}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>
						</center>	  					
						</td>
	  				</tr>	
	  			</tbody>
	  			@endforeach	
  			</table>
  		@endif
  	</div>
  </div>
</div>

@endsection