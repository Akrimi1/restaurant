@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">{{trans('Orders')}} <small class="ml-3 mr-3">|</small><small>{{trans('Orders Details')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/view')}}">{{trans('Orders Details')}}</a>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="clearfix"></div>
  @include('flash::message')
  <div class="card">
    <div class="card-header">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('view') }}"><i class="fa fa-file-text-o mr-2"></i>{{trans('Orders Details')}}</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
	  <canvas id="myChart" width="200" height="200" style="width:300px!important; height:300px!important;"></canvas>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<script src="{{asset('js/graph.js')}}"></script>
@endsection