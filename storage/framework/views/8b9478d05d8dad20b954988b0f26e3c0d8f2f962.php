

<?php $__env->startSection('main_content'); ?>
<style type="text/css">
   /* body{
        background-color: #EFF8FB;
    }*/
    th{
    	background-color: #819FF7;
    }
</style>

<div class="container table-responsive">
  <div class="row">
    <h1>Lista de ocupaciones</h1>
    <h4><a href="<?php echo e(route('ocupacion.create')); ?>">Registrar nueva ocupacion</a></h4>
    <hr />
  </div>
  <div class="row">
  	<div class="table-responsive">
  		<?php if($data): ?>
  			<table class="table table-hover table-bordered table-condensed">
  				<thead>
	  				<tr class="table table-info">
	  					<th>ID</th>
	  					<th>Nombre</th>
	  					<th>Descripcion</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  				<tr>
	  					<td><?php echo e($row->id); ?></td>
	  					<td><?php echo e($row->nombre); ?></td>
	  					<td><?php echo e($row->descripcion); ?></td>
	  					<td>
	  						<a href="<?php echo e(route('ocupacion.edit', $row->id)); ?>" class="btn btn-info">Editar</a>
							<form action="<?php echo e(route('ocupacion.destroy', $row->id)); ?>" method="post">
								<input type="hidden" name="_method" value="DELETE">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<button type="submit" class="btn btn-danger">Eliminar</button>
							</form>	  					
						</td>
	  				</tr>	
	  			</tbody>
	  			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
  			</table>
  		<?php endif; ?>
  	</div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>