@extends('layouts.appd')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.search_plural')}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{url('/search')}}">{{trans('lang.search_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.search_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.search_table')}}</a>
        </li>
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="#"><i class="fa fa-plus mr-2"></i>{{trans('lang.enquiry_create')}}</a>-->
        <!--</li>-->
      </ul>
    </div>
    <div class="card-body">
    @if(isset($details))
    <table class="table">
        <thead>
            <tr>
                <th>Vendor Name</th>
                <th>Manager Name</th>
                <th>Food</th>
                <th>Food Price</th>
                <th>Delivery Rider</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $restaurants)
            <tr>
                <td>{{$restaurants->restaurant_name}}</td>
                <td>{{$restaurants->manager_name}}</td>
                <td>{{$restaurants->food_description}}</td>
                <td>{{$restaurants->food_price}}</td>
                <td>{{$restaurants->rider_name}}</td>
                <td>
                    <div class='btn-group btn-group-sm'>
                      <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.order_view')}}" href="{{ URL('orders/'.$restaurants->id )}}" class='btn btn-link'>
                        <i class="fa fa-eye"></i>
                      </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection