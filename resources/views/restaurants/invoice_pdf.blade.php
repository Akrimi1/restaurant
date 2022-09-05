@extends('layouts.app')

@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0 text-dark">{{trans('Invoice')}} <small class="ml-3 mr-3">|</small><small>{{trans('Invoice PDF')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/contact')}}">{{trans('Invoice PDF')}}</a>
          </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="content">
 <div class="card">
     <div class="card-header">
	 <div class="row">
	 <div class="col-md-6">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
        </li>
      </ul>
	  </div>
	  <div class="col-md-6">
	  </div>
    </div>
	</div>
<div class="card-body">
<div class="">
    <table class="table table-bordered" width="100%">
        <thead>
        <tr>
            <th>Sr. No</th>
            <th>Restaurant Name</th>
            <th>Address</th>
			<th>Phone</th>
			<th>Information</th>
			<th>Admin Commission</th>
        </tr>
        </thead>
    <tbody>
    @foreach ($restaurant as $data)
      <tr>
        <td>{{ $data->id }}</td>
        <td>{{ $data->name }}</td>
        <td>{{ $data->address }}</td>
        <td>{{ $data->phone }}</td>
		<td>{{ $data->information }}</td>
		<td>{{ $data->admin_commission }}</td>
      </tr>
    @endforeach
  </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection