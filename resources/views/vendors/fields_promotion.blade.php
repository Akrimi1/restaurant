
<div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!-- Price Field -->
    <!--<div class="form-group row ">-->
    <!--    {!! Form::label('Name', trans("Name"), ['class' => 'col-3 control-label text-right']) !!}-->
    <!--    <div class="col-9">-->
    <!--        {!! Form::text('name', null,  ['class' => 'form-control','placeholder'=>  trans("Name")]) !!}   -->
    <!--    </div>-->
    <!--</div>-->


    <!--<form action="/image-upload" method="POST" enctype="multipart/form-data">-->
    <!--@csrf-->

    <!--<button type="submit">Upload</button>-->
<!--</form>-->



    <!-- Method Field -->
    <div class="form-group row ">
        {!! Form::label('title', trans("Title"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('title', null,  ['class' => 'form-control','placeholder'=>  trans("Add Title")]) !!}
        </div>
        </div>



        <!-- Description Field  -->
        <div class="form-group row ">
            {!! Form::label('description', trans("lang.payment_description"), ['class' => 'col-3 control-label text-right']) !!}
           <div class="col-9">
              {!! Form::textarea('description', null,  ['class' => 'form-control','placeholder'=>  trans("Enter Your Message here...")]) !!}

            </div>
        </div>


        <div class="form-group row">
            {!! Form::label('image', trans("Select Image"), ['class' => 'col-3 control-label text-right']) !!}
            <div class="col-9">

                  <input type="file" name="image">
                </div>

            </div>


    <div class="form-group row ">

    </div>



</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- {!! Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']) !!} -->
    <button type="submit" class=" btn btn-{{setting('theme_color')}}"><i class="fa fa-save"></i> {{trans('Save Promotion')}}</button>
    <a href="{{ url('/') }}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
