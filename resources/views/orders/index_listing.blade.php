@extends('layouts.appd')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.order_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.order_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('orders.index') !!}">{{trans('lang.order_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.order_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.order_table')}}</a>
        </li>
        @can('orders.create')
        <li class="nav-item">
          <a class="nav-link" href="{!! route('orders.create') !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.order_create')}}</a>
        </li>
        @endcan
       
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
                                
                                <th>{{trans('lang.actions')}}</th>
           </tr>
       </thead>


      <tbody>
          
          <!--<?php print_r($orders);  ?>-->
        
                            @foreach($orders as $key=>$value)

                                <tr>
                                    <?php $id = $value['id'];   ?>
                                    <td>#{!! $value['id'] !!}</td>
                                    <td>{!! $value['restaurant_name'] !!}</td>
                                     <td>
                                       {!! $value['manager_name'] !!}
                                    </td>
                                  
                                    <td>{!! $value['status'] !!}</td>
                                    <!--<td></td>-->
                                    <td>₦{!! $value['delivery_fee'] !!}</td>
                                    <td>@if(($value['payment_id']==1)) PAID @else UNPAID @endif</td>
                                    <!--<td></td>-->
                                   <td>@if(($value['active']==1)) YES @else NO @endif </td>
            <td>
            <div class='btn-group btn-group-sm'>

             
   <!--@can('orders.show')-->
                                       <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}" href="{{ route('orders.show', $id) }}" class='btn btn-link'>
    <i class="fa fa-eye"></i>
  </a>
  
 
                                      <!--@endcan-->
                                      
                                      
                                      
                                        @can('orders.edit')
  <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.order_edit')}}" href="{{ route('orders.edit', $id) }}" class='btn btn-link'>
    <i class="fa fa-edit"></i>
  </a>
  @endcan
  
  
  
    @can('orders.destroy')
{!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'delete']) !!}
  {!! Form::button('<i class="fa fa-trash"></i>', [
  'type' => 'submit',
  'class' => 'btn btn-link text-danger',
  'onclick' => "return confirm('Are you sure?')"
  ]) !!}
{!! Form::close() !!}
  @endcan
                                          

          </div>
        </td>

           
            </tr>

         @endforeach
       </tbody>

      </table>
        
        
        
        
        
       
        

      
  
      
      
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

