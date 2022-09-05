@extends('layouts.appd')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.category_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.category_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('categories.index') !!}">{{trans('lang.category_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.category_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.category_table')}}</a>
        </li>
        @can('categories.create')
        <li class="nav-item">
          <a class="nav-link" href="{!! route('categories.create') !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.category_create')}}</a>
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
             <th>TITLE</th>
             <th>DESCRIPTION</th>
             <th>IMAGE</th>
             <th>CREATED/UPDATED</th>
             <th>ACTION</th>
           </tr>
       </thead>


      <tbody>
          @foreach($promotion as $key => $data)
          <tr>
          <td>{{ $data['id'] }} </td>
            <td>{{ $data['title'] }} </td>
            <td>{{ $data['description'] }} </td>
            <?php $image = $data['image'];  ?>
            <!-- http://localhost/~karri/restaurant/public/ -->
            <!-- http://127.0.0.1:8000/images/1611963234.jpg -->

            <td>  {{ url('images/'.$image) }}  </td>
            <!-- <td>{{ $data['image'] }} </td> -->
            <td>{{ $data['updated_at'] }} </td>
            <!-- <td><a href="{{ URL('super_admin/promotion/edit/'.$data['id'] )}}" class="wt-btn">Edit</a></td> -->

            <td>
            <div class='btn-group btn-group-sm'>

              <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.category_edit')}}" href="{{ URL('super_admin/promotion/edit/'.$data['id'] )}}" class='btn btn-link'>
                <i class="fa fa-edit"></i>
              </a>

            <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}" href="{{ URL('super_admin/promotion/delete/'.$data['id'] )}}" class='btn btn-link'>
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






  <!-- </body>
</html> -->
