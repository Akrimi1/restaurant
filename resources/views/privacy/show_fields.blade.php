<!-- Id Field -->
<div class="form-group row col-6">
  {!! Form::label('id', 'Id:', ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    <p>{!! $about->id !!}</p>
  </div>
</div>

<!-- Question Field -->
<div class="form-group row col-6">
  {!! Form::label('content', 'Content:', ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    <p>{!! $about->content !!}</p>
  </div>
</div>



<!-- Created At Field -->
<div class="form-group row col-6">
  {!! Form::label('create_date', 'Created At:', ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    <p>{!! $about->create_date !!}</p>
  </div>
</div>

<!-- Updated At Field -->


