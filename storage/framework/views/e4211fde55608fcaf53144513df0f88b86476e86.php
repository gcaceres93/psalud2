<?php $__env->startSection('main_content'); ?>
<style type="text/css">
    body{
        background-color: #CEE3F6;
    }
</style>

<div class="container-fluid">
  <div class="row">
    <center><img class="img-responsive" src="/img/psa.png" alt="Logo"></center>  
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>