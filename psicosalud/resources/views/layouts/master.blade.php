<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Sistema de Consultorios</title>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="{{ URL::asset('laravel/bootstrap-3.3.7-dist/css/bootstrap.css') }}"/>


     <style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
    th{
    	background-color: #F8E0F7;
    	text-align: center;
    }
</style>
</head>
<body>
@include('layouts.partials.menu')

@yield('main_content')


</body>
</html>