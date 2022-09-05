@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('Managers')}}<small class="ml-3 mr-3">|</small><small>{{trans('Managers Management')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('categories.index') !!}">{{trans('Managers')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('Mangers Mangement')}}</li>
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
	  {{Form::open(array('url' => 'super_admin/save_manager', 'method' => 'post', 'files' => true))}}
     <!-- @csrf_field -->
        <div class="row">
            @include('managers.fields_managers')
        </div>
		{!! Form::close() !!}
      <div class="clearfix"></div>
    </div>
  </div>
</div>

@endsection
