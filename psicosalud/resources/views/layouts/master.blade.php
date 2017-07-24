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
     
    
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            var left  = ($(window).width()/2)-(900/2),
            top   = ($(window).height()/2)-(600/2),
            popup = window.open ($(this).data("href"), "popup", "width=900, height=600, top="+top+", left="+left);
            // window.open($(this).data("href"),'_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
        });
    });
    </script>

<!-- 	Script para el sort dinámico de las tablas del sistema. -->

    <script type="text/javascript">
    $(document).ready(function(){
        $('#tablaSort').DataTable({
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
    </script>
    

     <style type="text/css">
  
/*     Cambio de color de las cabeceras de las tablas   */
    th{
    	background-color: #F8E0F7;
    	text-align: center;
    }
    
/*     Cambio de puntero en el hover de las filas de las tablas con la class clickable-row que llevan  */
/*     al popup de visualizacion de registros */

    .clickable-row{
        cursor: pointer;    
    }
    
</style>
</head>
<body>
@include('layouts.partials.menu')

@yield('main_content')


</body>
</html>