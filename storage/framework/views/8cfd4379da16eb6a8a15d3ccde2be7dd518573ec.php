<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('Contact')); ?> <small><?php echo e(trans('All Enquries')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo route('coupons.index'); ?>"><?php echo e(trans('Contact')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('Contact')); ?></li>
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
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('Contact')); ?></a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.create')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo route('coupons.create'); ?>"><i class="fa fa-plus mr-2"></i><?php echo e(trans('Contact')); ?></a>
        </li>
        <?php endif; ?>
        <?php echo $__env->make('layouts.right_toolbar', compact('dataTable'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </ul>
    </div>
    <div class="card-body">
     <div class="col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                        
                                <th>store</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $value['store_id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                     <td>
                                       <?php echo $value['phone']; ?>

                                    </td>
                                    <td><?php echo $value['subject']; ?></td>
                                    <td><?php echo $value['enquiry']; ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/contact/showManager.blade.php ENDPATH**/ ?>