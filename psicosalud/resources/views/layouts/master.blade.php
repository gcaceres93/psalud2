<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Sistema de Consultorios</title>
     
<!--      Jquery -->
     <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
     
<!--      Bootstrap -->
     
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="{{ URL::asset('laravel/bootstrap-3.3.7-dist/css/bootstrap.css') }}"/>
     
<!--      DataTables plugin para el sorting dinamico de las tablas -->
     <link rel="stylesheet" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
     <script type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
     <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>
 
<!--  Estilos css varios para el sistema (cabeceras de tablas, fondos, etc.)     -->
	<link rel="stylesheet" href="{{ URL::asset('css/estilos.css') }}"/>  
	
<!-- funciones javascript y jquery para el funcionamiento del sistema	 -->
	<script type="text/javascript" src="/js/funciones.js"></script>
<!--  funciones javascript y css para plugin de agendas  -->	
	 <script src="/js/dhtmlxscheduler.js" type="text/javascript"></script>
   <link rel="stylesheet" href="{{ URL::asset('css/dhtmlxscheduler.css') }}" type="text/css">
	   
        
</head>
<body>
@include('layouts.partials.menu')

@yield('main_content')


</body>
</html>