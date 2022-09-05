@extends('layouts.app')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.earning_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('Yearly Report')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('earnings.index') !!}">{{trans('lang.earning_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.earning_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('Earnings')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""><i class="fa fa-plus mr-2"></i>{{trans('Yearly Report')}}</a>
        </li>
        </ul>
    </div>
    <div class="card-body">
	   <canvas id="earningYearly"></canvas>
       <div class="clearfix"></div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function () {
            earningYearly();
        });
</script>
<script src="{{asset('js/scripts.js')}}"></script>
@endsection
