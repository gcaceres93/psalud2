@extends('layouts.master')

@section('main_content')



<div class="container table-responsive">
  <div class="row">
    <h1>Lista de personas</h1>
    <h4><a class="btn btn-success" href="{{ route('persona.create') }}">Registrar nueva persona</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-bordered table-condensed display">
  				<thead>
	  				<tr>	
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>Apellido</th>
	  					<th>Cedula</th>
	  					<th>Fecha de nacimiento</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr> <a href=""></a>
	  					<td class="clickable-row" data-href="{{ route('persona.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('persona.show', $row->id)  }}">{{ $row->nombre }}</td>
	  					<td class="clickable-row" data-href="{{ route('persona.show', $row->id)  }}" >{{ $row->apellido	}}</td>
	  					<td class="clickable-row" data-href="{{ route('persona.show', $row->id)  }}">{{ $row->cedula	}}</td>
	  					<td class="clickable-row" data-href="{{ route('persona.show', $row->id)  }}">{{ $row->nacimiento	}}</td>
	  					<td>
	  						<center>
	  						<a href="{{ route('persona.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('persona.destroy', $row->id) }}" method="post">
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