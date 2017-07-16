<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Sistema de Consultorios</title>
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
     <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="<?php echo e(URL::asset('laravel/bootstrap-3.3.7-dist/css/bootstrap.css')); ?>"/>
</head>
<body>
<?php echo $__env->make('layouts.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('main_content'); ?>


</body>
</html>