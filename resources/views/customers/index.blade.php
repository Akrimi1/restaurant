
@extends('layouts.appd')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.customer_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.customer_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item active">{{trans('lang.customer_plural')}}
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
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('/customers') }}"><i class="fa fa-list mr-2"></i>{{trans('lang.customer_table')}}</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
<!-- <table id='exampleg' class='display' cellspacing='0' width='100%' style='padding-top:1rem;'> -->
      <div class="table-responsive">
      <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>Id</th>
        <th>Profile</th>
         <th>Name</th>
        <th>Email</th>
         <th>Phone</th>
        <th>App Joined(Date-Time)</th>
           </tr>
       </thead>


      <tbody>
          @foreach($customers as $key => $data)
          <tr>
              
              <td>{{ $data['id'] }} </td>
              <td><img src="http://92.42.110.51/~karri/api/assets/customer/{{ $data['profile'] }}" height="30px" width="30px"></td>
         
             
          <td>{{ $data['name'] }} </td>
           <td>{{ $data['email'] }} </td>
          <td>{{ $data['phone'] }} </td>
           <td>{{ $data['create_date'] }} </td>

         

            <!-- <td><a href="{{ URL('super_admin/promotion/delete/'.$data['id'] )}}" class="wt-btn">Delete</a></td> -->
            </tr>

         @endforeach
       </tbody>

      </table>
       </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection