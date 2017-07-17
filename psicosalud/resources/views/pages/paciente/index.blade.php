@extends('layouts.master')

@section('main_content')
{{-- <style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
    th{
    	background-color: #819FF7;
    }
</style> --}}

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de pacientes</h1>
    <h4><a class="btn btn-success" href="{{ route('paciente.create') }}">Registrar nuevo paciente</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		@if($data)
  			<table class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr>	
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>Apellido</th>
	  					<th>Cedula</th>
	  					<th>RUC</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			@foreach($data as $row)
	  				<tr> <a href=""></a>
	  					<td class="clickable-row" data-href="{{ route('paciente.show', $row->id)  }}">{{ $row->id }}</td>
	  					<td class="clickable-row" data-href="{{ route('paciente.show', $row->id)  }}">{{ $row->persona->nombre }}</td>
	  					<td class="clickable-row" data-href="{{ route('paciente.show', $row->id)  }}" >{{ $row->persona->apellido	}}</td>
	  					<td class="clickable-row" data-href="{{ route('paciente.show', $row->id)  }}">{{ $row->persona->cedula	}}</td>
	  					<td class="clickable-row" data-href="{{ route('paciente.show', $row->id)  }}">{{ $row->ruc	}}</td>
	  					<td>
	  						<center>
	  						<a href="{{ route('paciente.edit', $row->id) }}" class="btn btn-info">Editar</a>
							<form action="{{ route('paciente.destroy', $row->id) }}" method="post">
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