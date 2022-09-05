
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
<!-- Question Field -->
<div class="form-group row ">
  {!! Form::label('content',  trans("Privacy"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::textarea('content', null, ['class' => 'form-control','placeholder'=>
     trans("lang.faq_question_placeholder")  ]) !!}
  </div>
</div>

</div>
<div class="form-group col-12 text-right">
  <button type="submit" class="btn btn-{{setting('theme_color')}}" ><i class="fa fa-save"></i> {{trans('lang.save')}}</button>
  <a href="{!! route('about.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
