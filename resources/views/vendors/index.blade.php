@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">{{trans('Vendors')}} <small class="ml-3 mr-3">|</small><small>{{trans('Add Vendors')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/contact')}}">{{trans('Add Vendors')}}</a>
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
        
      </ul>
    </div>
    <div class="card-body">
          <!--<form action="/image-upload" method="POST" enctype="multipart/form-data">-->
    <!--@csrf-->
	   {{Form::open(array('url' => 'save_vendor', 'method' => 'post', 'files' => true))}}
        <div class="row">
            @include('vendors.fields') 
            
        </div>
		{!! Form::close() !!}
      <div class="clearfix"></div>
    </div>
  </div>
</div>

@endsection

