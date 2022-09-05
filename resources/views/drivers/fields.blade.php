

@if($customFields)
<h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    
 
 
 <!-- Delivery Rider Name Field -->   
      <div class="form-group row ">
        {!! Form::label('drivers', trans("lang.restaurant_drivers"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('drivers', $drivers, $driversSelected, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.restaurant_drivers_help") }}</div>
        </div>
    </div>
    
    
    
     <!--Selected Delivery Rider Name Field -->   
      <div class="form-group row ">
        {!! Form::label('name', trans("lang.restaurant_driver"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('name', $driver_name,  ['class' => 'form-control','placeholder'=>  trans("Latitude Field")]) !!}
            <div class="form-text text-muted">{{ trans("selected delivery boy") }}</div>
        </div>
    </div>
    
    
  

<!-- Delivery Rider latitude Field -->
<div class="form-group row ">
  {!! Form::label('latitude_field', trans("Latitude Field"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::text('latitude_field', null,  ['class' => 'form-control','placeholder'=>  trans("Latitude Field")]) !!}
    <div class="form-text text-muted">
      {{ trans("Insert latitude") }}
    </div>
  </div>
</div>



<!-- Delivery Rider longitude Field -->
<div class="form-group row ">
  {!! Form::label('longitude_field', trans("Longitude Field"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::text('longitude_field', null,  ['class' => 'form-control','placeholder'=>  trans("Longitude Field")]) !!}
    <div class="form-text text-muted">
      {{ trans("Insert longitude") }}
    </div>
  </div>
</div>



<!-- Delivery Rider proximity Field -->
<div class="form-group row ">
  {!! Form::label('proximity_field', trans("Proximity"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::text('proximity_field', null,  ['class' => 'form-control','placeholder'=>  trans("Proximity field")]) !!}
    <div class="form-text text-muted">
      {{ trans("Insert proximity in KM") }}
    </div>
  </div>
</div>





<!-- Delivery Fee Field -->
<div class="form-group row ">
  {!! Form::label('delivery_fee', trans("lang.driver_delivery_fee"), ['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::number('delivery_fee', null,  ['class' => 'form-control','placeholder'=>  trans("lang.driver_delivery_fee_placeholder")]) !!}
    <div class="form-text text-muted">
      {{ trans("lang.driver_delivery_fee_help") }}
    </div>
  </div>
</div>
<div class="form-group row ">
  {!! Form::label('rating', trans("lang.driver_rating"),['class' => 'col-3 control-label text-right']) !!}
  <div class="col-9">
    {!! Form::text('rating', null,  ['class' => 'form-control','placeholder'=>  trans("lang.driver_delivery_rating_placeholder")]) !!}
  </div>
</div>
</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

<!-- 'Boolean Available Field' -->
<div class="form-group row ">
  {!! Form::label('available', trans("lang.driver_available"),['class' => 'col-3 control-label text-right']) !!}
  <div class="checkbox icheck">
    <label class="col-9 ml-2 form-check-inline">
      {!! Form::hidden('available', 0) !!}
      {!! Form::checkbox('available', 1, null) !!}
    </label>
  </div>
</div>

</div>
@if($customFields)
<div class="clearfix"></div>
<div class="col-12 custom-field-container">
  <h5 class="col-12 pb-4">{!! trans('lang.custom_field_plural') !!}</h5>
  {!! $customFields !!}
</div>
@endif
<!-- Submit Field -->
<div class="form-group col-12 text-right">
  <button type="submit" class="btn btn-{{setting('theme_color')}}" ><i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.driver')}}</button>
  <a href="{!! route('drivers.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
