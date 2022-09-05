
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Price Field -->
    <!--<div class="form-group row ">-->
    <!--    <?php echo Form::label('Name', trans("Name"), ['class' => 'col-3 control-label text-right']); ?>-->
    <!--    <div class="col-9">-->
    <!--        <?php echo Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("Name")]); ?>   -->
    <!--    </div>-->
    <!--</div>-->


    <!--<form action="/image-upload" method="POST" enctype="multipart/form-data">-->
    <!--<?php echo csrf_field(); ?>-->

    <!--<button type="submit">Upload</button>-->
<!--</form>-->



    <!-- Method Field -->



  <!-- <?php if(isset($usersType)): ?>
  <?php endif; ?> -->
  
  
  <?php if(isset($managers)): ?>
  

    <div class="form-group row ">
        <?php echo Form::label('name', trans("Name"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('name', $managers->name,  ['class' => 'form-control','placeholder'=>  trans("Add Name")]); ?>

        </div>
        </div>
        
        
        <div class="form-group row ">
        <?php echo Form::label('email', trans("Email"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('email', $managers->email,  ['class' => 'form-control','placeholder'=>  trans("Add Email")]); ?>

        </div>
        </div>
        
        
        
        <!--   <div class="form-group row ">-->
        <!--<?php echo Form::label('password', trans("Password"), ['class' => 'col-3 control-label text-right']); ?>-->
        <!--<div class="col-9">-->
        <!--    <?php echo Form::text('password', $managers->password,  ['class' => 'form-control','placeholder'=>  trans("Add Password")]); ?>-->
        <!--</div>-->
        <!--</div>-->
        
        <div class="form-group row ">
        <div class="col-9">
        <br><br>
        Fields Only For Password Change
        <br>
        </div>
        </div>
        
        
        <!--   <div class="form-group row ">-->
        <!--<?php echo Form::label('old_password', trans("Old Password"), ['class' => 'col-3 control-label text-right']); ?>-->
        <!--<div class="col-9">-->
        <!--    <?php echo Form::text('old_password',null ,  ['class' => 'form-control','placeholder'=>  trans("Enter Old Password")]); ?>-->
        <!--</div>-->
        <!--</div>-->
        
        
          <div class="form-group row ">
        <?php echo Form::label('new_password', trans("New Password"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('new_password',null ,  ['class' => 'form-control','placeholder'=>  trans("Enter New Password")]); ?>

        </div>
        </div>
        
        
        
        <?php else: ?>
        
        
        
         <div class="form-group row ">
        <?php echo Form::label('name', trans("Name"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("Add Name")]); ?>

        </div>
        </div>
        
        
        <div class="form-group row ">
        <?php echo Form::label('email', trans("Email"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('email', null,  ['class' => 'form-control','placeholder'=>  trans("Add Email")]); ?>

        </div>
        </div>
        
        
      
        
        
           <div class="form-group row ">
        <?php echo Form::label('password', trans("Password"), ['class' => 'col-3 control-label text-right']); ?>

        <div class="col-9">
            <?php echo Form::text('password', null,  ['class' => 'form-control','placeholder'=>  trans("Add Password")]); ?>

        </div>
        </div>



   <?php endif; ?>



</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- <?php echo Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']); ?> -->
    <button type="submit" class=" btn btn-<?php echo e(setting('theme_color')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('Save Manager')); ?></button>
    <a href="<?php echo e(url('/')); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH /home/ka3r4ri/public_html/resources/views/managers/fields_managers.blade.php ENDPATH**/ ?>