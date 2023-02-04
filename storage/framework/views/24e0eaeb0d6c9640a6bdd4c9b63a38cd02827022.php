<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('lang.food_plural')); ?><small class="ml-3 mr-3">|</small><small><?php echo e(trans('lang.food_desc')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo route('foods.index'); ?>"><?php echo e(trans('lang.food_plural')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('lang.food_table')); ?></li>
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
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('lang.food_table')); ?></a>
        </li>
       
        <?php echo $__env->make('layouts.right_toolbar', compact('dataTable'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </ul>
    </div>
    <div class="card-body">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('foods.create')): ?>
        <form method="GET" action="<?php echo route('foods.create'); ?>" class="d-flex flex-column justify-content-center align-items-center h-25">
          <button type="submit" class="nav-link btn btn-white btn-square-md" href="<?php echo route('foods.create'); ?>">
          <div class="d-flex flex-column justify-content-center align-items-center h-25">
             
            <i class="fa-solid fa-circle-plus fa-lg pb-4"></i>

            <?php echo e(trans('lang.food_create')); ?>

        </div>
      </button>
      </form>
        
        <?php endif; ?>
      <?php echo $__env->make('foods.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<style>
.btn-square-md {
width: 140px !important;
max-width: 100% !important;
max-height: 100% !important;
height: 100px !important;
text-align: center;
padding: 0px;
font-size:16px!important;
background: transparent;
border: 2px solid #F9F8F8!important;
color: #558F91;
}
</style>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/foods/index.blade.php ENDPATH**/ ?>