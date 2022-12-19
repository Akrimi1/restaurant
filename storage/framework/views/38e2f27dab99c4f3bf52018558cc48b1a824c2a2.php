
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
<!-- Question Field -->
<div class="form-group row ">
  <?php echo Form::label('content', trans("Term"), ['class' => 'col-3 control-label text-right']); ?>

  <div class="col-9">
    <?php echo Form::textarea('content', null, ['class' => 'form-control','placeholder'=>
     trans("about")  ]); ?>

    <!--<div class="form-text text-muted"><?php echo e(trans("lang.faq_question_help")); ?></div>-->
  </div>
</div>

</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
  <button type="submit" class="btn btn-<?php echo e(setting('theme_color')); ?>" ><i class="fa fa-save"></i> <?php echo e(trans('lang.save')); ?> <?php echo e(trans('Terms')); ?></button>
  <a href="<?php echo route('about.index'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> <?php echo e(trans('lang.cancel')); ?></a>
</div>
<?php /**PATH C:\wamp64\www\karri\resources\views/terms/fields.blade.php ENDPATH**/ ?>