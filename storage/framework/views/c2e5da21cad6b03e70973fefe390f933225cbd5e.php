<?php $__env->startPush('css_lib'); ?>
<!-- iCheck -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/flat/blue.css')); ?>">
<!-- select2 -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">

<link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/bootstrap.min.css')); ?>">
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<style>
.note-editor.note-frame{
    display:none;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?php echo e(trans('lang.cuisine_plural')); ?><small class="ml-3 mr-3">|</small><small><?php echo e(trans('lang.cuisine_desc')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo route('cuisines.index'); ?>"><?php echo e(trans('lang.cuisine_plural')); ?></a>
          </li>
          <li class="breadcrumb-item active"><?php echo e(trans('lang.cuisine_edit')); ?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="clearfix"></div>
  <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="clearfix"></div>
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cuisines.index')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo route('cuisines.index'); ?>"><i class="fa fa-list mr-2"></i><?php echo e(trans('lang.cuisine_table')); ?></a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cuisines.create')): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo route('cuisines.create'); ?>"><i class="fa fa-plus mr-2"></i><?php echo e(trans('lang.cuisine_create')); ?></a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-pencil mr-2"></i><?php echo e(trans('lang.cuisine_edit')); ?></a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <?php echo Form::model($cuisine, ['route' => ['cuisines.update', $cuisine->id], 'method' => 'patch']); ?>

      <div class="row">
        <?php echo $__env->make('cuisines.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <?php echo Form::close(); ?>

      <div class="clearfix"></div>
    </div>
  </div>
</div>
<?php echo $__env->make('layouts.media_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts_lib'); ?>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<!-- iCheck -->
<script src="<?php echo e(asset('plugins/iCheck/icheck.min.js')); ?>"></script>
<!-- select2 -->
<script src="<?php echo e(asset('plugins/select2/select2.min.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/dropzone/dropzone.js')); ?>"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    var dropzoneFields = [];
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/karri/public_html/restaurant/resources/views/cuisines/edit.blade.php ENDPATH**/ ?>