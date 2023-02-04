<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark"><?php echo e(trans('Vendors')); ?> <small class="ml-3 mr-3">|</small><small><?php echo e(trans('Add Vendors')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('/contact')); ?>"><?php echo e(trans('Add Vendors')); ?></a>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="clearfix"></div>
  <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        
      </ul>
    </div>
    <div class="card-body">
          <!--<form action="/image-upload" method="POST" enctype="multipart/form-data">-->
    <!--<?php echo csrf_field(); ?>-->
	   <?php echo e(Form::open(array('url' => 'save_vendor', 'method' => 'post', 'files' => true))); ?>

        <div class="row">
            <?php echo $__env->make('vendors.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
            
        </div>
		<?php echo Form::close(); ?>

      <div class="clearfix"></div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/vendors/index.blade.php ENDPATH**/ ?>