@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
   
</style> --}}

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de Usuarios</h1>
    <h4><a class="btn btn-success" href="{{ route('user.create') }}">Registrar nuevo Usuario</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr>
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>E-mail</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->name }}</td>
	  					<td>{{ $row->email }}</td>
	  					<td>
	  					<center>
	  						<a href="{{ route('user.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('user.destroy', $row->id) }}" method="post">
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