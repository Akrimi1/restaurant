<?php $__env->startSection('content'); ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark"><?php echo e(trans('Orders')); ?> <small class="ml-3 mr-3">|</small><small><?php echo e(trans('Completed Orders')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item active"><?php echo e(trans('Completed Orders')); ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="clearfix"></div>
  <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="card">
    <div class="card-header">
	  <div class="row">
	  <div class="col-md-6">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('orders/completed')); ?>"><i class="fa fa-file-text-o mr-2"></i><?php echo e(trans('Completed Orders')); ?></a>
        </li>
      </ul>
	  </div>
	  </div>
    </div>
    <div class="card-body">
          <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>Order Id</th>
        <th>Customer</th>
         <th>Vendor Name</th>
        <th>Delivery Rider</th>
         <th>Order Status</th>
        <th>Order Date</th>
        <th>Action</th>
           </tr>
       </thead>


      <tbody>
          <?php $__currentLoopData = $completed_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <td><?php echo e($data['id']); ?> </td>
               <td><?php echo e($data['customer_name']); ?></td>
               <td><?php echo e($data['restaurant_name']); ?> </td>
               <td><?php echo e($data['driver_name']); ?></td>
               <td><?php echo e($data['status']); ?></td>
               <td><?php echo e($data['created_at']); ?> </td>
               <td>
                   <a href="<?php echo e(url('/orders', $data['id'] )); ?>" class="btn btn-link"><i class="fa fa-eye"></i></a>
                   <a href="<?php echo e(url('/track/view', $data['id'] )); ?>" class="btn btn-link"><i class="fa fa-map-marker"></i></a>
               </td> 
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/orders/completed.blade.php ENDPATH**/ ?>