
<?php $user_id = e(Auth::user()->id);?>
@if($customFields)
    <h5 class="col-12 pb-4">{!! trans('lang.main_fields') !!}</h5>
@endif
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Name Field -->
    <!--<input type="hidden"value="< ?php echo $user_id  ?>" >-->
    <div class="form-group row ">
        {!! Form::label('name', trans("lang.restaurant_name"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_name_placeholder")]) !!}
            {!! Form::hidden('store_id', $store_id,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_name_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_name_help") }}
            </div>
        </div>
    </div>
    <!-- cuisines Field -->
    <div class="form-group row ">
        {!! Form::label('cuisines[]', trans("lang.restaurant_cuisines"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('cuisines[]', $cuisine, $cuisinesSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.restaurant_cuisines_help") }}</div>
        </div>
    </div>
    @hasanyrole('admin|manager')
    <!-- Users Field -->
    <div class="form-group row ">
        {!! Form::label('drivers[]', trans("lang.restaurant_drivers"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('drivers[]', $drivers, $driversSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
            <div class="form-text text-muted">{{ trans("lang.restaurant_drivers_help") }}</div>
        </div>
    </div>
    <!-- delivery_fee Field -->
    <div class="form-group row ">
        {!! Form::label('delivery_fee', trans("lang.restaurant_delivery_fee"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
              <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
            {!! Form::number('delivery_fee', null,  ['class' => 'form-control','step'=>'any','placeholder'=>  trans("lang.restaurant_delivery_fee_placeholder")]) !!}
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_delivery_fee_help") }}
            </div>
        </div>
    </div>

    <!-- delivery_range Field -->
    <div class="form-group row ">
        {!! Form::label('delivery_range', trans("lang.restaurant_delivery_range"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
              <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">Km</div>
        </div>
            {!! Form::number('delivery_range', null,  ['class' => 'form-control', 'step'=>'any','placeholder'=>  trans("lang.restaurant_delivery_range_placeholder")]) !!}
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_delivery_range_help") }}
            </div>
        </div>
    </div>

    <!-- default_tax Field -->
    <div class="form-group row ">
        {!! Form::label('default_tax', trans("lang.restaurant_default_tax"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">%</div>
        </div>
            {!! Form::number('default_tax', null,  ['class' => 'form-control', 'step'=>'any','placeholder'=>  trans("lang.restaurant_default_tax_placeholder")]) !!}
            </div>
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_default_tax_help") }}
            </div>
        </div>
    </div>

    @endhasanyrole


     <!-- Email Field -->
    <div class="form-group row ">
        {!! Form::label('email', trans("lang.vendor_email"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('email', null,  ['class' => 'form-control','placeholder'=>  trans("lang.vendor_email_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.vendor_email_help") }}
            </div>
        </div>
    </div>


       <!-- Password Field -->
    <div class="form-group row ">
        {!! Form::label('password', trans("Password"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('password', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Password")]) !!}
            <div class="form-text text-muted">
                {{ trans("Enter Password Here") }}
            </div>
        </div>
    </div>



    <!-- Phone Field -->
    <div class="form-group row ">
        {!! Form::label('phone', trans("lang.restaurant_phone"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('phone', null,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_phone_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_phone_help") }}
            </div>
        </div>
    </div>

    <!-- Mobile Field -->
    <div class="form-group row ">
        {!! Form::label('mobile', trans("lang.restaurant_mobile"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('mobile', null,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_mobile_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_mobile_help") }}
            </div>
        </div>
    </div>



    <!-- Address Field -->
    <div class="form-group row ">
        {!! Form::label('address', trans("lang.restaurant_address"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::textarea('address', null,  ['class' => 'form-control','id' => 'editor', 'placeholder'=>  trans("lang.restaurant_address_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_address_help") }}
            </div>
        </div>
    </div>

    <!-- Latitude Field -->
    <div class="form-group row ">
        {!! Form::label('latitude', trans("lang.restaurant_latitude"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('latitude', null,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_latitude_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_latitude_help") }}
            </div>
        </div>
    </div>

    <!-- Longitude Field -->
    <div class="form-group row ">
        {!! Form::label('longitude', trans("lang.restaurant_longitude"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('longitude', null,  ['class' => 'form-control','placeholder'=>  trans("lang.restaurant_longitude_placeholder")]) !!}
            <div class="form-text text-muted">
                {{ trans("lang.restaurant_longitude_help") }}
            </div>
        </div>
    </div>


    <!-- Opening Time-closing time -->
  <?php  $time = array("10 AM"=>"10 AM", "11 AM"=>"11 AM", "12 NOON"=>"12 NOON", "1 PM"=>"1 PM", "2 PM"=>"2 PM", "3 PM"=>"3 PM", "4 PM"=>"4 PM", "5 PM"=>"5 PM", "6 PM"=>"6 PM","7 PM"=>"7 PM", "8 PM"=>"8 PM", "9 PM"=>"9 PM", "10 PM"=>"10 PM", "11 PM"=>"11 PM");  ?>

 <?php $working_days = array("Sunday"=>"Sunday", "Monday"=>"Monday", "Tuesday"=>"Tuesday", "Wednesday"=>"Wednesday", "Thrusday"=>"Thrusday", "Friday"=>"Friday", "Saturday"=>"Saturday");    ?>



    <div class="form-group row ">
        {!! Form::label('opening_time', trans("Opening Time"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('opening_time', $time, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("Insert Opening Time") }}</div>
        </div>
    </div>

        <!-- Opening Time-closing time -->
      <div class="form-group row ">
        {!! Form::label('closing_time', trans("Closing Time"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('closing_time', $time, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("Insert Closing Time") }}</div>
        </div>
    </div>

    <!-- Working-Days -->
     <div class="form-group row ">
            {!! Form::label('working_days[]', trans("Working Days"),['class' => 'col-3 control-label text-right']) !!}
            <div class="col-9">
                {!! Form::select('working_days[]', $working_days, $daysSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
                <div class="form-text text-muted">{{ trans("Insert Closing Days") }}</div>
            </div>
        </div>





    <!-- 'Boolean closed Field' -->
    <div class="form-group row ">
        {!! Form::label('closed', trans("lang.restaurant_closed"),['class' => 'col-3 control-label text-right']) !!}
        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                {!! Form::hidden('closed', 0) !!}
                {!! Form::checkbox('closed', 1, null) !!}
            </label>
        </div>
    </div>

    <!-- 'Boolean available_for_delivery Field' -->
    <div class="form-group row ">
        {!! Form::label('available_for_delivery', trans("lang.restaurant_available_for_delivery"),['class' => 'col-3 control-label text-right']) !!}
        <div class="checkbox icheck">
            <label class="col-9 ml-2 form-check-inline">
                {!! Form::hidden('available_for_delivery', 0) !!}
                {!! Form::checkbox('available_for_delivery', 1, null) !!}
            </label>
        </div>
    </div>

</div>
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

    <!-- Image Field -->
    <div class="form-group row">
        {!! Form::label('image', trans("lang.restaurant_image"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            <div style="width: 100%" class="dropzone image" id="image" data-field="image">
                <input type="hidden" name="image">
            </div>
            <a href="#loadMediaModal" data-dropzone="image" data-toggle="modal" data-target="#mediaModal" class="btn btn-outline-{{setting('theme_color','primary')}} btn-sm float-right mt-1">{{ trans('lang.media_select')}}</a>
            <div class="form-text text-muted w-50">
                {{ trans("lang.restaurant_image_help") }}
            </div>
        </div>
    </div>
    @prepend('scripts')
        <script type="text/javascript">
            var var15671147011688676454ble = '';
            @if(isset($restaurant) && $restaurant->hasMedia('image'))
                var15671147011688676454ble = {
                name: "{!! $restaurant->getFirstMedia('image')->name !!}",
                size: "{!! $restaurant->getFirstMedia('image')->size !!}",
                type: "{!! $restaurant->getFirstMedia('image')->mime_type !!}",
                collection_name: "{!! $restaurant->getFirstMedia('image')->collection_name !!}"
            };
                    @endif
            var dz_var15671147011688676454ble = $(".dropzone.image").dropzone({
                    url: "{!!url('uploads/store')!!}",
                    addRemoveLinks: true,
                    maxFiles: 1,
                    init: function () {
                        @if(isset($restaurant) && $restaurant->hasMedia('image'))
                        dzInit(this, var15671147011688676454ble, '{!! url($restaurant->getFirstMediaUrl('image','thumb')) !!}')
                        @endif
                    },
                    accept: function (file, done) {
                        dzAccept(file, done, this.element, "{!!config('medialibrary.icons_folder')!!}");
                    },
                    sending: function (file, xhr, formData) {
                        dzSending(this, file, formData, '{!! csrf_token() !!}');
                    },
                    maxfilesexceeded: function (file) {
                        dz_var15671147011688676454ble[0].mockFile = '';
                        dzMaxfile(this, file);
                    },
                    complete: function (file) {
                        dzComplete(this, file, var15671147011688676454ble, dz_var15671147011688676454ble[0].mockFile);
                        dz_var15671147011688676454ble[0].mockFile = file;
                    },
                    removedfile: function (file) {
                        dzRemoveFile(
                            file, var15671147011688676454ble, '{!! url("restaurants/remove-media") !!}',
                            'image', '{!! isset($restaurant) ? $restaurant->id : 0 !!}', '{!! url("uplaods/clear") !!}', '{!! csrf_token() !!}'
                        );
                    }
                });
            dz_var15671147011688676454ble[0].mockFile = var15671147011688676454ble;
            dropzoneFields['image'] = dz_var15671147011688676454ble;
        </script>
@endprepend

<!-- Description Field -->
    <div class="form-group row ">
        {!! Form::label('description', trans("lang.restaurant_description"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'editor2','placeholder'=>
             trans("lang.restaurant_description_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.restaurant_description_help") }}</div>
        </div>
    </div>
    <!-- Information Field -->
    <div class="form-group row ">
        {!! Form::label('information', trans("lang.restaurant_information"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::textarea('information', null, ['class' => 'form-control','id' => 'editor3','placeholder'=>
             trans("lang.restaurant_information_placeholder")  ]) !!}
            <div class="form-text text-muted">{{ trans("lang.restaurant_information_help") }}</div>
        </div>
    </div>


<!-- vendors list -->

    <div class="form-group row ">
        {!! Form::label('vendors_list', trans("Category list"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('vendors_list', $vendors_list, null, ['class' => 'select2 form-control']) !!}
            <div class="form-text text-muted">{{ trans("Insert Vendor Name") }}</div>
        </div>
    </div>
    
<!-- Overallprices -->    
 <div class="form-group row ">
        {!! Form::label('Overallprices', trans("Overall Prices"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('Overallprices', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Overall price")]) !!}
            <div class="form-text text-muted">
                {{ trans("Enter Overall Price For Restaurant") }}
            </div>
        </div>
    </div>
    
    
    <!-- Price Persons -->    
 <div class="form-group row ">
        {!! Form::label('pricePersons', trans("Persons For Price"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('pricePersons', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Persons For Price")]) !!}
            <div class="form-text text-muted">
                {{ trans("Enter Persons For Price For Restaurant") }}
            </div>
        </div>
    </div>
    
    
        <!-- Expected Time -->    
 <div class="form-group row ">
        {!! Form::label('expectTime', trans("Expected Time"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('expectTime', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Expected Time")]) !!}
            <div class="form-text text-muted">
                {{ trans("Enter Expected Time For Restaurant") }}
            </div>
        </div>
    </div>
    
    
            <!-- overall rating -->    
 <div class="form-group row ">
        {!! Form::label('overallRating', trans("Overall Rating"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('overallRating', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Overall rating")]) !!}
            <div class="form-text text-muted">
                {{ trans("Enter Overall Rating") }}
            </div>
        </div>
    </div>
    

</div>



<div class="col-12 custom-field-container">
     @if($user_id == 1)
    <h5 class="col-12 pb-4">{!! trans('lang.admin_area') !!}</h5>
    @else
    <h5 class="col-12 pb-4">{!! trans('Manager Configuration') !!}</h5>
    @endif
    <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
        <!-- Users Field -->
        <div class="form-group row ">
            {!! Form::label('users[]', trans("lang.restaurant_users"),['class' => 'col-3 control-label text-right']) !!}
            <div class="col-9">
                {!! Form::select('users[]', $user, $usersSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}
                <div class="form-text text-muted">{{ trans("lang.restaurant_users_help") }}</div>
            </div>
        </div>

    </div>
    <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
        <!-- admin_commission Field -->
        <div class="form-group row ">
            {!! Form::label('admin_commission', trans("lang.restaurant_admin_commission"), ['class' => 'col-3 control-label text-right']) !!}
            <div class="col-9">
                {!! Form::number('admin_commission', null,  ['class' => 'form-control', 'step'=>'any', 'placeholder'=>  trans("lang.restaurant_admin_commission_placeholder")]) !!}
                <div class="form-text text-muted">
                    {{ trans("lang.restaurant_admin_commission_help") }}
                </div>
            </div>
        </div>
        <!-- <div class="form-group row ">
            {!! Form::label('active', trans("lang.restaurant_active"),['class' => 'col-3 control-label text-right']) !!}
            <div class="checkbox icheck">
                <label class="col-9 ml-2 form-check-inline">
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, null) !!}
                </label>
            </div>
        </div> -->
    </div>





    <!--<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">-->
        <!-- Users Field -->
    <!--    <div class="form-group row ">-->
    <!--        {!! Form::label('drivers[]', trans("Delivery Rider"),['class' => 'col-3 control-label text-right']) !!}-->
    <!--        <div class="col-9">-->
    <!--            {!! Form::select('drivers[]', $drivers, $driversSelected, ['class' => 'select2 form-control' , 'multiple'=>'multiple']) !!}-->
    <!--            <div class="form-text text-muted">{{ trans("lang.restaurant_drivers_help") }}</div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!--</div>-->






    <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">

         <div class="form-group row ">
            {!! Form::label('driver_commission', trans("Driver Commission"), ['class' => 'col-3 control-label text-right']) !!}
          <div class="col-9">
             {!! Form::number('driver_commission', null,  ['class' => 'form-control', 'step'=>'any', 'placeholder'=>  trans("lang.restaurant_admin_commission_placeholder")]) !!}
              <div class="form-text text-muted">
                  {{ trans("Driver Comission (Ex 30 for 30% to driver)") }}
              </div>
           </div>
        </div>


        <div class="form-group row ">
            {!! Form::label('active', trans("lang.restaurant_active"),['class' => 'col-3 control-label text-right']) !!}
            <div class="checkbox icheck">
                <label class="col-9 ml-2 form-check-inline">
                    {!! Form::hidden('active', 0) !!}
                    {!! Form::checkbox('active', 1, null) !!}
                </label>
            </div>
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
    <button type="submit" class="btn btn-{{setting('theme_color')}}"><i class="fa fa-save"></i> {{trans('lang.save')}} {{trans('lang.restaurant')}}</button>
    <a href="{!! route('restaurants.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>

@push('scripts_lib')
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-zYSaBxS74gXyWulpcrFuogMApeMxSFg&libraries=places&callback=initMap"
async defer></script>
@endpush
@push('scripts')
<script>
var input = document.getElementById('address');
var originLatitude = document.getElementById('s_latitude');
var originLongitude = document.getElementById('s_longitude');

var originAutocomplete = new google.maps.places.Autocomplete(input);


originAutocomplete.addListener('place_changed', function(event) {
    var place = originAutocomplete.getPlace();

    if (place.hasOwnProperty('place_id')) {
        if (!place.geometry) {
                // window.alert("Autocomplete's returned place contains no geometry");
                return;
        }
        originLatitude.value = place.geometry.location.lat();
        originLongitude.value = place.geometry.location.lng();
    } else {
        service.textSearch({
                query: place.name
        }, function(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                originLatitude.value = results[0].geometry.location.lat();
                originLongitude.value = results[0].geometry.location.lng();
            }
        });
    }
});
</script>

@endpush
