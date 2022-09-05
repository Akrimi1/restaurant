@extends('layouts.appd')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">{{trans('Orders')}} <small class="ml-3 mr-3">|</small><small>{{trans('Completed Orders')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item active">{{trans('Order in Progress')}}</li>
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
	  <div class="row">
	  <div class="col-md-6">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('orders/progress_orders') }}"><i class="fa fa-file-text-o mr-2"></i>{{trans('Orders in Progress')}}</a>
        </li>
      </ul>
	  </div>
	  </div>
    </div>
    <div class="card-body">
          <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>Order Id</th>
        <th>Customer</th>
         <th>Vendor Name</th>
        <th>Delivery Rider</th>
         <th>Order Status</th>
        <th>Order Date</th>
        <th>Action</th>
           </tr>
       </thead>


      <tbody>
          @foreach($progress_orders as $key => $data)
          <tr>
              <td>{{  $data['id'] }} </td>
               <td>{{ $data['customer_name'] }} </td>
               <td>{{ $data['restaurant_name'] }} </td>
               <td>{{ $data['driver_name'] }}</td>
               <td>{{ $data['status'] }}</td>
               <td>{{ $data['created_at'] }} </td>
               <td>
                   <a href="{{ url('/orders', $data['id'] ) }}" class="btn btn-link"><i class="fa fa-eye"></i></a>
                   <a href="{{ url('/track/view', $data['id'] ) }}" class="btn btn-link"><i class="fa fa-map-marker"></i></a>
               </td> 
            </tr>
         @endforeach
       </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<script src="{{asset('js/scripts.js')}}"></script>
@endsection