@extends('layouts.app')

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


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>



  </head>
  <body>

    <table id="example" class="display" style="width:100%" border = "5">
      <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        <th>CREATED/UPDATED</th>
        <th>ACTION</th>
        </tr>


        @foreach($promotion as $key => $data)
        <tr>
        <td>{{ $data['id'] }} </td>
          <td>{{ $data['title'] }} </td>
          <td>{{ $data['description'] }} </td>
          <td>{{ $data['image'] }} </td>
          <td>{{ $data['updated_at'] }} </td>
          <td><a href="{{ URL('super_admin/promotion/edit/'.$data['id'] )}}" class="wt-btn">Edit</a></td>
          <!-- <td><a href="{{ URL('super_admin/promotion/delete/'.$data['id'] )}}" class="wt-btn">Delete</a></td> -->
          </tr>

       @endforeach



    </table>
    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
  </body>
</html>
