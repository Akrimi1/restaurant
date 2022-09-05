@extends('layouts.appd')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('Track Order')}}<small class="ml-3 mr-3">|</small><small>{{trans('Track Order')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{trans('Track Order')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('Track Order')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('Track')}}</a>
        </li>

      </ul>
    </div>
    <div class="card-body">
              <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
          <thead>
           <tr>
                                <th>Order ID</th>
                                <th>Vendor Name</th>
                                <th>Manager Name</th>
                                <th>Order Status</th>
                                <!--<th>Commismion</th>-->
                                <th> Delivery Fee</th>
                                <th>Payment Status</th>
                                <!--<th>Method</th>-->
                                <th>Active</th>
                                <th>Track Rider</th>
           </tr>
       </thead>
      <tbody>
          
          <!--<?php print_r($track);  ?>-->
        
                            @foreach($track as $key=>$value)

                                <tr>
                                    <?php $id = $value['id'];   ?>
                                    <td>#{!! $value['id'] !!}</td>
                                    <td>{!! $value['restaurant_name'] !!}</td>
                                     <td>
                                       {!! $value['manager_name'] !!}
                                    </td>
                                    <td>{!! $value['status'] !!}</td>
                                    <td>₦{!! $value['delivery_fee'] !!}</td>
                                    <td>@if(($value['payment_id']==1)) PAID @else UNPAID @endif</td>
                                   <td>@if(($value['active']==1)) YES @else NO @endif </td>
                                      <?php $status = $value['status'];   ?>
                                   @if($status == "On the Way")
                                    <td>
                                    <div class='btn-group btn-group-sm'>
                                       <a data-toggle="tooltip" data-placement="bottom" title="{{trans('Track Rider')}}" href="" class='btn btn-link'>
                                         <i class="fa fa-map-marker"></i>
                                       </a>
                                    </div>
                                    </td>
                                    @endif
                                       @if($status == "Order Completed")
                                    <td>
                                    <div class='btn-group btn-group-sm'>
                                       <a data-toggle="tooltip" data-placement="bottom" title="{{trans('Track Rider')}}" href="{{ url('/track/view', $id) }}" class='btn btn-link'>
                                         <i class="fa fa-map-marker"></i>
                                       </a>
                                    </div>
                                    </td>
                                    @endif
                                </tr>
         @endforeach
       </tbody>
      </table>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

