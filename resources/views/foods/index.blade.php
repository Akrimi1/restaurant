@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.food_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.food_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('foods.index') !!}">{{trans('lang.food_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.food_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.food_table')}}</a>
        </li>       
        @include('layouts.right_toolbar', compact('dataTable'))
      </ul>
    </div>
    <div class="card-body">
    @can('foods.create')
        <form method="GET" action="{!! route('foods.create') !!}" class="d-flex flex-column justify-content-center align-items-center h-25">
          <button type="submit" class="nav-link btn btn-white btn-square-md" href="{!! route('foods.create') !!}">
          <div class="d-flex flex-column justify-content-center align-items-center h-25">
             
            <i class="fa-solid fa-circle-plus fa-lg pb-4"></i>

            {{trans('lang.food_create')}}
        </div>
      </button>
      </form>
        
        @endcan
      @include('foods.table')
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection
<style>
.btn-square-md {
width: 140px !important;
max-width: 100% !important;
max-height: 100% !important;
height: 100px !important;
text-align: center;
padding: 0px;
font-size:16px!important;
background: transparent;
border: 2px solid #F9F8F8!important;
color: #558F91;
}
</style>

