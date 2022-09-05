<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('lang.enquiry_plural')); ?><small class="ml-3 mr-3">|</small><small><?php echo e(trans('lang.enquiry_desc')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('/enquiry')); ?>"><?php echo e(trans('lang.enquiry_plural')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('lang.enquiry_table')); ?></li>
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
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('lang.enquiry_table')); ?></a>
        </li>
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="#"><i class="fa fa-plus mr-2"></i><?php echo e(trans('lang.enquiry_create')); ?></a>-->
        <!--</li>-->
      </ul>
    </div>
    <div class="card-body">
        <!-- <table id='exampleg' class='display' cellspacing='0' width='100%' style='padding-top:1rem;'> -->
      <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>ID</th>
            <th>NAME</th>
            <th>ENQUIRY</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ROLE</th>
            <th>CREATED AT</th>
            <th>ACTION</th>
           </tr>
       </thead>
       
       
       


      <tbody>
          <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
           $role_id=$data['role_id'];
          ?>
       
          <tr>
          <td><?php echo e($data['id']); ?> </td>
          <td><?php echo e($data['name']); ?> </td>
          <td><?php echo e($data['enquiry']); ?> </td>
          <td><?php echo e($data['email']); ?> </td>
          <td><?php echo e($data['phone']); ?> </td>
          <td> <?php if($role_id == "2"): ?>
                Admin
              <?php elseif($role_id == "3"): ?>
                Manager
              <?php elseif($role_id == "4"): ?>
              Customer
               <?php else: ?>
              Driver
                <?php endif; ?> </td>
          <td><?php echo e($data['create_date']); ?> </td>
            <td>
            <div class='btn-group btn-group-sm'>
            <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.view_details')); ?>" href="<?php echo e(url('/enquiry/delete/'.$data['id'])); ?>" class='btn btn-link'>
              <i class="fa fa-trash"></i>
            </a>
          </div>
        </td>
            </tr>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </tbody>

      </table>

      
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.appd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/karri/public_html/restaurant/resources/views/enquiry/index.blade.php ENDPATH**/ ?>