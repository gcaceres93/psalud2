@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    <h1>Lista de preguntas del cuestionario</h1>
    <h4><a class="btn btn-success" href="{{ route('cuestionarioAnamnesis.create') }}">Registrar nueva pregunta para el cuestionario de Anamnesis</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Orden de aparición</th>
	  					<th>Pregunta</th>
	  					<th>Grupo</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr>
	  					<td>{{ $row->id }}</td>
	  					<td>{{ $row->orden }}</td>
	  					<td>{{ $row->pregunta }}</td>
	  					<td>{{ $row->grupo }}</td>
	  					<td>
	  						<a href="{{ route('cuestionarioAnamnesis.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('cuestionarioAnamnesis.destroy', $row->id) }}" method="post">
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