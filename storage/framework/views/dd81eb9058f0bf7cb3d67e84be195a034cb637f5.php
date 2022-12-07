<?php $__env->startPush('css_lib'); ?>
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iCheck/flat/blue.css')); ?>">
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/select2/select2.min.css')); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/dropzone/bootstrap.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('settings_title',trans('lang.user_table')); ?>
<?php $__env->startSection('settings_content'); ?>
    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('adminlte-templates::common.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo url()->current(); ?>"><i class="fa fa-money mr-2"></i><?php echo e(trans('lang.app_setting_'.$tab)); ?></a>
                </li>
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="<?php echo url('settings/payment/paypal'); ?>"><i class="fa fa-envelope mr-2"></i><?php echo e(trans('lang.app_setting_paypal')); ?><?php if(setting('enable_paypal', false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?></a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="<?php echo url('settings/payment/stripe'); ?>"><i class="fa fa-envelope-o mr-2"></i><?php echo e(trans('lang.app_setting_stripe')); ?><?php if(setting('enable_stripe',false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="<?php echo url('settings/payment/razorpay'); ?>"><i class="fa fa-envelope-o mr-2"></i><?php echo e(trans('lang.app_setting_razorpay')); ?><?php if(setting('enable_razorpay',false)): ?><span class="badge ml-2 badge-success"><?php echo e(trans('lang.active')); ?></span><?php endif; ?>-->
                <!--    </a>-->
                <!--</li>-->

                <div class="ml-auto d-inline-flex">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currencies.index')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo route('currencies.index'); ?>"><span class="nav-icon ml-1">₦</span> <?php echo e(trans('lang.currency_table')); ?></a>
                        </li>
                    <?php endif; ?>
                </div>

            </ul>
        </div>
        <div class="card-body">
            <?php echo Form::open(['url' => ['settings/update'], 'method' => 'patch']); ?>
            <div class="row">
                <h5 class="col-12 pb-4"><i class="mr-3 fa fa-money"></i><?php echo trans('lang.app_setting_default_tax'); ?></h5>
                <!-- default_tax Field -->
                <div class="form-group row col-6">
                    <?php echo Form::label('default_tax', trans('lang.app_setting_default_tax'), ['class' => 'col-4 control-label text-right']); ?>
                    <div class="col-8">
                        <?php echo Form::text('default_tax', setting('default_tax'),  ['class' => 'form-control','placeholder'=>  trans('lang.app_setting_default_tax_placeholder')]); ?>
                        <div class="form-text text-muted">
                            <?php echo trans('lang.app_setting_default_tax_help'); ?>
                        </div>
                    </div>
                </div>

                <h5 class="col-12 pb-4 custom-field-container"><i class="mr-3 fa fa-money"></i><?php echo trans('lang.app_setting_default_currency'); ?></h5>
                <!-- default_currency Field -->
                <div class="form-group row col-6">
                    <?php echo Form::label('default_currency', trans('lang.app_setting_default_currency'), ['class' => 'col-4 control-label text-right']); ?>
                    <div class="col-8">
                        <?php echo Form::select('default_currency',
                        $currencies
                        , setting('default_currency_id',1), ['class' => 'select2 form-control']); ?>
                        <div class="form-text text-muted"><?php echo e(trans("lang.app_setting_default_currency_help")); ?></div>
                    </div>
                </div>

                <div class="form-group row col-6">
                    <?php echo Form::label('currency_right', trans('lang.app_setting_currency_right'),['class' => 'col-4 control-label text-right']); ?>
                    <div class="checkbox icheck">
                        <label class="w-100 ml-2 form-check-inline">
                            <?php echo Form::hidden('currency_right', null); ?>
                            <?php echo Form::checkbox('currency_right', 1, setting('currency_right', false)); ?>
                            <span class="ml-2"><?php echo trans('lang.app_setting_currency_right_help'); ?></span>
                        </label>
                    </div>
                </div>

                <!-- Submit Field -->
                <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>">
                        <i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('lang.app_setting_payment')); ?>
                    </button>
                    <a href="<?php echo route('users.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
                </div>
            </div>
            <?php echo Form::close(); ?>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>
    <?php echo $__env->make('layouts.media_modal',['collection'=>null], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts_lib'); ?>
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

<?php echo $__env->make('layouts.settings.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/settings/payment/payment.blade.php ENDPATH**/ ?>