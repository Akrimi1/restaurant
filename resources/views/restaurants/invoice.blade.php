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
          <a class="nav-link" href=""><i class="fa fa-envelope-open mr-2"></i>{{trans('Invoice')}}</a>
        </li>
      </ul>
	  </div>
	  <div class="col-md-6">
	  <a href=" {{ URL::to('restaurants/invoice_pdf') }}">Download PDF</a>
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
    @foreach ($restaurants as $restaurant)
      <tr>
        <td>{{ $restaurant->id }}</td>
        <td>{{ $restaurant->name }}</td>
        <td>{{ $restaurant->address }}</td>
        <td>{{ $restaurant->phone }}</td>
		<td>{{ $restaurant->information }}</td>
		<td>{{ $restaurant->admin_commission }}</td>
      </tr>
    @endforeach
  </tbody>
  </table>
</div>
</div>
</div>
</div>
@endsection