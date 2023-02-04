<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('Category')); ?><small class="ml-3 mr-3">|</small><small><?php echo e(trans('Category Management')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo route('categories.index'); ?>"><?php echo e(trans('Category')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('category Mangement')); ?></li>
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
          <a class="nav-link active" href="<?php echo e(url('/show_vendors')); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('Categories list')); ?></a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.create')): ?>
        
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="<?php echo e(url('Restaurants/add_vendors_details')); ?>"><i class="fa fa-plus mr-2"></i><?php echo e(trans('Create New category')); ?></a>-->
          
        
        <!--</li>-->
        <?php endif; ?>

      </ul>
    </div>
    <div class="card-body">


<!-- <table id='exampleg' class='display' cellspacing='0' width='100%' style='padding-top:1rem;'> -->
      <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>ID</th>
        <th>CATEGORY</th>
        
        <th>ACTION</th>
           </tr>
       </thead>


      <tbody>
          <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
          <td><?php echo e($data['id']); ?> </td>
          <td><?php echo e($data['category']); ?> </td>
        

            <td>
            <div class='btn-group btn-group-sm'>

              <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.category_edit')); ?>" href="<?php echo e(URL('super_admin/category/edit/'.$data['id'] )); ?>" class='btn btn-link'>
                <i class="fa fa-edit"></i>
              </a>

            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.view_details')); ?>" href="<?php echo e(URL('super_admin/category/delete/'.$data['id'] )); ?>" class='btn btn-link'>
              <i class="fa fa-trash"></i>
            </a>


          </div>
        </td>

            <!-- <td><a href="<?php echo e(URL('super_admin/promotion/delete/'.$data['id'] )); ?>" class="wt-btn">Delete</a></td> -->
            </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>

      </table>



      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/vendors/demoo.blade.php ENDPATH**/ ?>