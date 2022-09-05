<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('lang.notification_plural')); ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo route('notifications.index'); ?>"><?php echo e(trans('lang.notification_plural')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('lang.notification_table')); ?></li>
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
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('lang.notification_table')); ?></a>
        </li>
        <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications.create')): ?>-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="<?php echo route('notifications.create'); ?>"><i class="fa fa-plus mr-2"></i><?php echo e(trans('lang.notification_create')); ?></a>-->
        <!--</li>-->
        <!--<?php endif; ?>-->
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
                                <th>Id</th>
                             
                                <th>Notifications</th>
                                <th>Notifications Type</th>
                                <th>Notification Time</th>
                                  <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <?php $id = $value['id'];   ?>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['message']; ?></td>
                                     <td>
                                       <?php echo $value['notifiable_type']; ?>

                                    </td>
                                    <td><?php echo $value['read_at']; ?></td>
                                       <td>
            <div class='btn-group btn-group-sm'>

             
  <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications.show')): ?>-->
  <!--                                     <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('lang.view_details')); ?>" href="<?php echo e(route('notifications.show', $id)); ?>" class='btn btn-link'>-->
  <!--  <i class="fa fa-eye"></i>-->
  <!--</a>-->
  
 
  <!--                                    <?php endif; ?>-->

  
  
  
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notifications.destroy')): ?>
<?php echo Form::open(['route' => ['notifications.destroy', $id], 'method' => 'delete']); ?>

  <?php echo Form::button('<i class="fa fa-trash"></i>', [
  'type' => 'submit',
  'class' => 'btn btn-link text-danger',
  'onclick' => "return confirm('Are you sure?')"
  ]); ?>

<?php echo Form::close(); ?>

  <?php endif; ?>
                                          

          </div>
        </td>
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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/karri/public_html/restaurant/resources/views/notifications/index.blade.php ENDPATH**/ ?>