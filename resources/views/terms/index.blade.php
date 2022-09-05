@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('Terms Of Services')}}<small class="ml-3 mr-3">|</small><small>{{trans('Terms Of Services')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{trans('Terms Of Services')}}</a>
          </li>
          <!--<li class="breadcrumb-item active">{{trans('lang.faq_table')}}</li>-->
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('About Us')}}</a>
        </li>
        <!--@can('faqs.create')-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="{!! route('faqs.create') !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.faq_create')}}</a>-->
        <!--</li>-->
        <!--@endcan-->
        @include('layouts.right_toolbar', compact('dataTable'))
      </ul>
    </div>
    <div class="card-body">
     <div class="col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                        
                            
                                <th>Terms Of Services</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($terms as $key=>$value)
                                <tr>
                                         <?php $id = $value['id'];   ?>
                               
                                    <td>{!! $value['content'] !!}</td>
                                    <td>
                                     <div class='btn-group btn-group-sm'>
                                       
                                           <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ url('/terms/edit', $id) }}" class='btn btn-link'>
                                              <i class="fa fa-edit"></i>
                                           </a>
                                       
                                    </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

