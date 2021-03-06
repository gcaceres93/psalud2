@extends('layouts.master')

@section('main_content')


<div class="container table-responsive">
  <div class="row">
    @if(Route::currentRouteName() == 'medico.index')
    <h1>Lista de profesionales de la salud</h1>
		<h4><a class="btn btn-success" href="{{ route('medico.create') }}">Registrar nuevo médico</a></h4>
    @else
    	<h1>Lista de empleados</h1>
    	<h4><a class="btn btn-success" href="{{ route('empleado.create') }}">Registrar nuevo empleado</a></h4>
    @endif
    <div class="alert alert-info">
 		 Para ver detalle del registro, hacer click encima de la fila.
	</div>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table id="tablaSort" class="table table-hover table-condensed">
  				<thead>
	  				<tr>
	  					<th colspan="5">Datos del empleado</th>
	  					<th colspan="2">Horario de disponibilidad</th>
	  					<th rowspan="2" style="vertical-align: middle">Acciones</th>
	  				</tr>	
	  				<tr>
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>Apellido</th>
	  					<th>Cedula</th>
	  					<th>Cargo</th>
	  					<th>Desde </th>
	  					<th>Hasta</th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr> <a href=""></a>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->persona->nombre }}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}" >{{ $row->persona->apellido	}}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->persona->cedula	}}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->cargo->descripcion	}}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->disponibilidad_desde }}</td>
	  					<td class="clickable-row" data-href="{{ route('empleado.show', $row->id)  }}">{{ $row->disponibilidad_hasta }}</td>
	  					<td>
	  						<center>
	  						<a href="{{ route('empleado.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('empleado.destroy', $row->id) }}" method="post">
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