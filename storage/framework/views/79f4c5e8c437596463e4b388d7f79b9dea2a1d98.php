<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('Track Order')); ?><small class="ml-3 mr-3">|</small><small><?php echo e(trans('Track Order')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href=""><?php echo e(trans('Track Order')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('Track Order')); ?></li>
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
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('Track')); ?></a>
        </li>

      </ul>
    </div>
    <div class="card-body">
              <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
          <thead>
           <tr>
                                <th>Order ID</th>
                                <th>Vendor Name</th>
                                <th>Manager Name</th>
                                <th>Order Status</th>
                                <!--<th>Commismion</th>-->
                                <th> Delivery Fee</th>
                                <th>Payment Status</th>
                                <!--<th>Method</th>-->
                                <th>Active</th>
                                <th>Track Rider</th>
           </tr>
       </thead>
      <tbody>
          
          <!--<?php print_r($track);  ?>-->
        
                            <?php $__currentLoopData = $track; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <?php $id = $value['id'];   ?>
                                    <td>#<?php echo $value['id']; ?></td>
                                    <td><?php echo $value['restaurant_name']; ?></td>
                                     <td>
                                       <?php echo $value['manager_name']; ?>

                                    </td>
                                    <td><?php echo $value['status']; ?></td>
                                    <td>₦<?php echo $value['delivery_fee']; ?></td>
                                    <td><?php if(($value['payment_id']==1)): ?> PAID <?php else: ?> UNPAID <?php endif; ?></td>
                                   <td><?php if(($value['active']==1)): ?> YES <?php else: ?> NO <?php endif; ?> </td>
                                      <?php $status = $value['status'];   ?>
                                   <?php if($status == "On the Way"): ?>
                                    <td>
                                    <div class='btn-group btn-group-sm'>
                                       <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('Track Rider')); ?>" href="" class='btn btn-link'>
                                         <i class="fa fa-map-marker"></i>
                                       </a>
                                    </div>
                                    </td>
                                    <?php endif; ?>
                                       <?php if($status == "Order Completed"): ?>
                                    <td>
                                    <div class='btn-group btn-group-sm'>
                                       <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('Track Rider')); ?>" href="<?php echo e(url('/track/view', $id)); ?>" class='btn btn-link'>
                                         <i class="fa fa-map-marker"></i>
                                       </a>
                                    </div>
                                    </td>
                                    <?php endif; ?>
                                </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri.li\public_html\restaurant\resources\views/track/index.blade.php ENDPATH**/ ?>