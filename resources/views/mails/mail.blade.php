@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.driver_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.driver_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href=""><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{trans('lang.driver_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.driver_table')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="content">
  <div class="clearfix"></div>
 
  <div class="card">
    <div class="card-header">
      
    </div>
    <div class="card-body">
         <h1>Hi, {{ $name }}</h1>
         <p>Sending Mail from Laravel.</p>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

