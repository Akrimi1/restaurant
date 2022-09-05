
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



  <!-- @if(isset($usersType))
  @endif -->
  
  
  @if(isset($vendors))

    <div class="form-group row ">
        {!! Form::label('category', trans("Name"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('category', $vendors->category,  ['class' => 'form-control','placeholder'=>  trans("Add Category")]) !!}
        </div>
        </div>
        
        
         <div class="form-group row ">
        {!! Form::label('image', trans("Image"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('image', $vendors->image,  ['class' => 'form-control','placeholder'=>  trans("Add Image")]) !!}
            
            <img src="{{ url('images/' . $vendors->image) }}" />
        </div>
        </div>
        
        
        <div class="form-group row">
            {!! Form::label('image', trans("Select Image"), ['class' => 'col-3 control-label text-right']) !!}
            <div class="col-9">

                  <input type="file" name="images">
                </div>

            </div>
        
        
       
        
        
     
       
        
        @else
        
     <div class="form-group row ">
        {!! Form::label('category', trans("Name"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('category', $vendors->category,  ['class' => 'form-control','placeholder'=>  trans("Add Category")]) !!}
        </div>
        </div>
        
        
         <div class="form-group row ">
        {!! Form::label('image', trans("Image"), ['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::text('image', url('images/$vendor->image'),  ['class' => 'form-control','placeholder'=>  trans("Add Image")]) !!}
        </div>
        </div>



   @endif



</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- {!! Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']) !!} -->
    <button type="submit" class=" btn btn-{{setting('theme_color')}}"><i class="fa fa-save"></i> {{trans('Save Category')}}</button>
    <a href="{{ url('/') }}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
