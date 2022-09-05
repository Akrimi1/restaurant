@extends('layouts.appd')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('Managers')}}<small class="ml-3 mr-3">|</small><small>{{trans('Managers Management')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('categories.index') !!}">{{trans('Managers')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('Mangers Mangement')}}</li>
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
          <a class="nav-link active" href="{{ url('/manager_details') }}"><i class="fa fa-list mr-2"></i>{{trans('Managers list')}}</a>
        </li>
        @can('categories.create')
        
        <li class="nav-item">
          <a class="nav-link" href="{{ url('super_admin/add_manager') }}"><i class="fa fa-plus mr-2"></i>{{trans('Create New manager')}}</a>
          
        
        </li>
        @endcan

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
        <th>EMAIL</th>
        <th>CREATED/UPDATED</th>
        <th>ACTION</th>
           </tr>
       </thead>


      <tbody>
          @foreach($managers as $key => $data)
          <tr>
          <td>{{ $data['id'] }} </td>
          <td>{{ $data['name'] }} </td>
          <td>{{ $data['email'] }} </td>
           <td>{{ $data['updated_at'] }} </td>

            <td>
            <div class='btn-group btn-group-sm'>

              <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.category_edit')}}" href="{{ URL('super_admin/managers/edit/'.$data['id'] )}}" class='btn btn-link'>
                <i class="fa fa-edit"></i>
              </a>

            <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}" href="{{ URL('super_admin/managers/delete/'.$data['id'] )}}" class='btn btn-link'>
              <i class="fa fa-trash"></i>
            </a>


          </div>
        </td>

            <!-- <td><a href="{{ URL('super_admin/promotion/delete/'.$data['id'] )}}" class="wt-btn">Delete</a></td> -->
            </tr>

         @endforeach
       </tbody>

      </table>



      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection