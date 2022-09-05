@php
 $role_id =  $id = Auth::user()->role_id; 

@endphp
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <input type="hidden" name="role_id" value="">
    <!-- Price Field -->
    <div class="form-group row ">
        {!! Form::label('Name', trans("Name"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("Name")]) !!}   
        </div>
    </div>
    <!-- User Id Field -->
    <div class="form-group row ">
        {!! Form::label('Email', trans("Email"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=> trans("Email")]) !!}
        </div>
    </div>
    
    <div class="form-group row ">
        {!! Form::label('Phone', trans("Phone"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder'=> trans("Phone")]) !!}
        </div>
    </div>

    <!-- Method Field -->
    <div class="form-group row ">
        {!! Form::label('Subject', trans("Subject"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('subject', null,  ['class' => 'form-control','placeholder'=>  trans("Subject")]) !!}
        </div>
    </div>
    
    <!-- Description Field -->
    <div class="form-group row ">
        {!! Form::label('enquiry', trans("lang.payment_description"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::textarea('enquiry', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Your Message here...")]) !!}
           
        </div>
    </div>

</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- {!! Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']) !!} -->
    <button type="submit" class=" btn btn-{{setting('theme_color')}}"><i class="fa fa-save"></i> {{trans('Send Admin')}}</button>
    <a href="{{ url('/contact') }}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
