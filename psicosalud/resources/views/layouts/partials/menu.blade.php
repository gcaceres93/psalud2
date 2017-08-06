<link rel="stylesheet" href="{{ URL::asset('css/menu.css') }}"/>     

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }} </a>
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" class="active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultorio <span class="glyphicon glyphicon-briefcase"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Registrar consultorio</a></li>
            <li class="dropdown-header">AGENDAS</li>
            <li><a href="{{ url('/verificarAgenda') }}">Verificar disponibilidad</a></li>
            <li><a href="{{ url('/agendamiento') }}">Listado de agendamientos</a></li>
            <li><a href="{{ url('/agendamiento/create') }}">Registrar agendamiento</a></li>
            <li><a href="{{ url('/agendas') }}">Consultar agendas</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">CONSULTAS</li>
            <li><a href="{{ url('/consulta') }}">Listado de consultas</a></li>
            <li><a href="{{ url('/consulta/create') }}">Registrar consulta</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">REPORTES</li>
            <li><a href="{{ url('/reporteAsistencia') }}">Reporte de asistencias</a></li>
          </ul>
        </li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes <span class="glyphicon glyphicon-heart"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="{{ route('paciente.create') }}">Registrar paciente</a></li>
                  <li><a href="{{ url('/paciente') }}">Listar pacientes</a></li>
                  <li><a href="#">Historial de pacientes</a></li>
              </ul>
          </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Médicos <span class="glyphicon glyphicon-eye-open"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="{{ route('medico.create') }}">Registrar médico</a></li>
                  <li><a href="{{ url('tarifaHora') }}">Registrar Tarifas</a></li>
                  <li><a href="{{ url('/medico') }}">Listar médicos</a></li>
                  <li><a href="#">Consultar agenda de médico</a></li>
              </ul>
          </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultas y seguimientos <span class="glyphicon glyphicon-file"></span></a>
              <ul class="dropdown-menu">
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">ANAMNESIS</li>
                  <li><a href="{{route('anamnesis.create') }}">Registrar anamnesis</a></li>
                  <li><a href="{{ url('/anamnesis') }}">Listar anamnesis</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">TRATAMIENTO Y SEGUIMIENTO</li>
                  <li><a href="#">Registrar plan de tratamiento</a></li>
                  <li><a href="#">Registrar seguimiento</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">APLICACION DE TESTS Y RESULTADOS</li>
                  <li><a href="{{ url('/test') }}">Registrar test</a></li>
                  <li><a href="#">Aplicar test</a></li>
                  <li><a href="#">Listar tests aplicados</a></li>
              </ul>
          </li>


          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facturación <span class="glyphicon glyphicon-usd"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="{{ route('factura.create') }}">Facturar</a></li>
                  <li><a href="{{ url('/factura') }}">Listar facturas</a></li>
                  <li><a href="{{ url('/cobro') }}">Listar cobros</a></li>
              </ul>
          </li>

          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración <span class="glyphicon glyphicon-cog"></span></a>
              <ul class="dropdown-menu">
                  <li class="dropdown-header">ABM USUARIOS</li>
                  <li><a href="{{ url('/user') }}">Usuarios</a></li>
                  <li><a href="{{ url('/rol') }}">Roles</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">CONFIGURACION DE TEST Y ANAMNESIS</li>
                  <li><a href="/cuestionarioAnamnesis">Cuestionario anamnesis</a></li>
                  <li><a href="#">Preguntas por Test</a></li>
                  <li><a href="#">Respuestas por preguntas</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">ABM TABLAS PARAMETRICAS</li>
                  <li><a href="{{ url('/ocupacion') }}">Ocupaciones</a></li>
                  <li><a href="{{ url('/persona') }}">Personas</a></li>
                  <li><a href="{{ url('/empleado') }}">Empleados</a></li>
                  <li><a href="{{ url('/sucursal') }}">Sucursales</a></li>
                  <li><a href="{{ url('/tipoFamiliar') }}">Tipo familiares</a></li>
                  <li><a href="{{ url('/modalidad') }}">Modalidades de consulta</a></li>
                  <li><a href="{{ url('/impuestos') }}">Tipo impuestos</a></li>
                  <li><a href="{{ url('/cargo') }}">Cargos</a></li>
                  <li><a href="{{ url('/tipoTerapia') }}">Tipo terapias</a></li>
                  <li><a href="{{ url('/facturaconcepto') }}">Facturas concepto</a></li>
                  
              </ul>
          </li>

      </ul>



      <ul class="nav navbar-nav navbar-right">
        
      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">  <span class="glyphicon glyphicon-user"></span>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
