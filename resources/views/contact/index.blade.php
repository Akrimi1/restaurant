@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<?php $user_id = e(Auth::user()->id);

$role_id = DB::table('users')->select('role_id')->where('id', $user_id)->first();

   $role_id=$role_id->role_id;



?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">{{trans('Contact')}} <small class="ml-3 mr-3">|</small><small>{{trans('Contact Admin')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/contact')}}">{{trans('Contact Admin')}}</a>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="clearfix"></div>
  @include('flash::message')
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('contact') }}"><i class="fa fa-envelope-open mr-2"></i>{{trans('Contact Admin')}}</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
	   {{Form::open(array('url' => 'store', 'method' => 'GET', 'files' => true))}}
        <div class="row">
           <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
    <!--<input type="hidden" name="rol_id">-->
    <!-- Price Field -->
    <div class="form-group row ">
        {!! Form::label('stores', trans("lang.store_id"),['class' => 'col-3 control-label text-right']) !!}
        <div class="col-9">
            {!! Form::select('stores_name', $stores_name ,null, ['class' => 'form-control']) !!}
            <div class="form-text text-muted">{{ trans("lang.store_id_help") }}</div>
        </div>
    </div>
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
    
    <div class="form-group row ">
                <div class="col-9" >
          <input type="hidden" name="role_id" id="role_id" value="{{$role_id}}">
           
        </div>

               <div class="form-group row ">
        <div class="col-9" >
          <input type="hidden" name="manager_id" id="manager_id" value="{{$user_id}}">
           
        </div>
    </div>


               <div class="form-group row ">
        <div class="col-9" >
          <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$user_id}}">
           
        </div>
    </div>

    </div>
    


</div>
<!-- Submit Field -->
<div class="form-group col-12 text-right">
   <!-- {!! Form::submit('Send Admin', ['class' => ' fa fa-save btn btn-primary']) !!} -->
    <button type="submit" class=" btn btn-{{setting('theme_color')}}"><i class="fa fa-save"></i> {{trans('Send Admin')}}</button>
    <a href="{{ url('/contact') }}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.cancel')}}</a>
</div>
        </div>
		{!! Form::close() !!}
      <div class="clearfix"></div>
    </div>
  </div>
</div>

@endsection

