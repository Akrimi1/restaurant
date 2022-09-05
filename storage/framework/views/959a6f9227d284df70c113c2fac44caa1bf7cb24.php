<?php $__env->startSection('content'); ?>
<!-- Content Header (Page header) -->
<?php $user_id = e(Auth::user()->id);

$role_id = DB::table('users')->select('role_id')->where('id', $user_id)->first();

   $role_id=$role_id->role_id;



?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark"><?php echo e(trans('Contact')); ?> <small class="ml-3 mr-3">|</small><small><?php echo e(trans('Contact Admin')); ?></small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('lang.dashboard')); ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo e(url('/contact')); ?>"><?php echo e(trans('Contact Admin')); ?></a>
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
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('contact')); ?>"><i class="fa fa-envelope-open mr-2"></i><?php echo e(trans('Contact Admin')); ?></a>
        </li>
      </ul>
    </div>
    <div class="card-body">
	   <?php echo e(Form::open(array('url' => 'store', 'method' => 'GET', 'files' => true))); ?>

        <div class="row">
           <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!--<input type="hidden" name="rol_id">-->
    <!-- Price Field -->
    <div class="form-group row ">
        <?php echo Form::label('Name', trans("Name"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("Name")]); ?>   
        </div>
    </div>
    <!-- User Id Field -->
    <div class="form-group row ">
        <?php echo Form::label('Email', trans("Email"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::email('email', null, ['class' => 'form-control', 'placeholder'=> trans("Email")]); ?>

        </div>
    </div>
    
    <div class="form-group row ">
        <?php echo Form::label('Phone', trans("Phone"),['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('phone', null, ['class' => 'form-control', 'placeholder'=> trans("Phone")]); ?>

        </div>
    </div>

    <!-- Method Field -->
    <div class="form-group row ">
        <?php echo Form::label('Subject', trans("Subject"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('subject', null,  ['class' => 'form-control','placeholder'=>  trans("Subject")]); ?>

        </div>
    </div>
    
    <!-- Description Field -->
    <div class="form-group row ">
        <?php echo Form::label('enquiry', trans("lang.payment_description"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::textarea('enquiry', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Your Message here...")]); ?>

           
        </div>
    </div>
    
    <div class="form-group row ">
                <div class="col-9" >
          <input type="hidden" name="role_id" id="role_id" value="<?php echo e($role_id); ?>">
           
        </div>

               <div class="form-group row ">
        <div class="col-9" >
          <input type="hidden" name="manager_id" id="manager_id" value="<?php echo e($user_id); ?>">
           
        </div>
    </div>


               <div class="form-group row ">
        <div class="col-9" >
          <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?php echo e($user_id); ?>">
           
        </div>
    </div>

    </div>
    


</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- <?php echo Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']); ?> -->
    <button type="submit" class=" btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('Send Admin')); ?></button>
    <a href="<?php echo e(url('/contact')); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
        </div>
		<?php echo Form::close(); ?>

      <div class="clearfix"></div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri.li\public_html\restaurant\resources\views/contact/index.blade.php ENDPATH**/ ?>