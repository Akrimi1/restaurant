
<?php $__env->startSection('content'); ?>
    <div class="card-body login-card-body">
        <p class="login-box-msg"><?php echo e(__('auth.reset_password_title')); ?></p>

        <form method="POST" action="<?php echo e(route('password.request')); ?>">
            <?php echo csrf_field(); ?>


            <input type="hidden" name="token" value="<?php echo e($token); ?>">

            <div class="input-group mb-3">
                <input value="<?php echo e(old('email')); ?>" type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" placeholder="<?php echo e(__('auth.email')); ?>" aria-label="<?php echo e(__('auth.email')); ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <div class="input-group mb-3">
                <input value="<?php echo e(old('password')); ?>" type="password" class="form-control  <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="<?php echo e(__('auth.password')); ?>" aria-label="<?php echo e(__('auth.password')); ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <?php if($errors->has('password')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <div class="input-group mb-3">
                <input value="<?php echo e(old('password_confirmation')); ?>" type="password" class="form-control  <?php echo e($errors->has('password_confirmation') ? ' is-invalid' : ''); ?>" name="password_confirmation" placeholder="<?php echo e(__('auth.password_confirmation')); ?>" aria-label="<?php echo e(__('auth.password_confirmation')); ?>">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <?php if($errors->has('password_confirmation')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password_confirmation')); ?>

                    </div>
                <?php endif; ?>
            </div>

            <div class="row mb-2">
                <div class="col-4 ml-auto">
                    <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('auth.reset_password')); ?></button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <p class="mb-1 text-center">
            <a href="<?php echo e(url('/login')); ?>" class="text-center"><?php echo e(__('auth.remember_password')); ?></a>
        </p>
    </div>
    <!-- /.login-card-body -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ka3r4ri/public_html/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>