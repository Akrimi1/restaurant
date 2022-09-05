
@extends('layouts.appd')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.enquiry_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.enquiry_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{url('/enquiry')}}">{{trans('lang.enquiry_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.enquiry_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.enquiry_table')}}</a>
        </li>
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="#"><i class="fa fa-plus mr-2"></i>{{trans('lang.enquiry_create')}}</a>-->
        <!--</li>-->
      </ul>
    </div>
    <div class="card-body">
        <!-- <table id='exampleg' class='display' cellspacing='0' width='100%' style='padding-top:1rem;'> -->
      <table id="example" class="display"  border = "0" width='100%' cellspacing='0' style='padding-top:1rem;'>
        <!-- <table id="example" class="display nowrap" style="width:100%"> -->
          <thead>
           <tr>
           <th>ID</th>
            <th>NAME</th>
            <th>ENQUIRY</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>ROLE</th>
            <th>CREATED AT</th>
            <th>ACTION</th>
           </tr>
       </thead>
       
       
       


      <tbody>
          @foreach($enquiries as $key => $data)
          @php 
           $role_id=$data['role_id'];
          @endphp
       
          <tr>
          <td>{{ $data['id'] }} </td>
          <td>{{ $data['name'] }} </td>
          <td>{{ $data['enquiry'] }} </td>
          <td>{{ $data['email'] }} </td>
          <td>{{ $data['phone'] }} </td>
          <td> @if($role_id == "2")
                Admin
              @elseif($role_id == "3")
                Manager
              @elseif($role_id == "4")
              Customer
               @else($role_id == "5")
              Driver
                @endif </td>
          <td>{{ $data['created_at'] }} </td>
            <td>
            <div class='btn-group btn-group-sm'>
            <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}" href="{{url('/enquiry/delete/'.$data['id'])}}" class='btn btn-link'>
              <i class="fa fa-trash"></i>
            </a>
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