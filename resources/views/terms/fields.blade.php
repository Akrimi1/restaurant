
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
<!-- Question Field -->
<div class="form-group row ">
  {!! Form::label('content', trans("Term"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::textarea('content', null, ['class' => 'form-control','placeholder'=>
     trans("about")  ]) !!}
    <!--<div class="form-text text-muted">{{ trans("lang.faq_question_help") }}</div>-->
  </div>
</div>

</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
  <button type="submit" class="btn btn-{{setting('theme_color')}}" ><i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('Terms')}}</button>
  <a href="{!! route('about.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
