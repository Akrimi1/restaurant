@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.notification_plural')}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('notifications.index') !!}">{{trans('lang.notification_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.notification_table')}}</li>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.notification_table')}}</a>
        </li>
        <!--@can('notifications.create')-->
        <!--<li class="nav-item">-->
        <!--  <a class="nav-link" href="{!! route('notifications.create') !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.notification_create')}}</a>-->
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
                                <th>Id</th>
                             
                                <th>Notifications</th>
                                <th>Notifications Type</th>
                                <th>Notification Time</th>
                                  <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notifications as $key=>$value)

                                <tr>
                                    <?php $id = $value['id'];   ?>
                                    <td>{!! $value['id'] !!}</td>
                                    <td>{!! $value['message'] !!}</td>
                                     <td>
                                       {!! $value['notifiable_type'] !!}
                                    </td>
                                    <td>{!! $value['read_at'] !!}</td>
                                       <td>
            <div class='btn-group btn-group-sm'>

             
  <!-- @can('notifications.show')-->
  <!--                                     <a data-toggle="tooltip" data-placement="bottom" title="{{trans('lang.view_details')}}" href="{{ route('notifications.show', $id) }}" class='btn btn-link'>-->
  <!--  <i class="fa fa-eye"></i>-->
  <!--</a>-->
  
 
  <!--                                    @endcan-->

  
  
  
    @can('notifications.destroy')
{!! Form::open(['route' => ['notifications.destroy', $id], 'method' => 'delete']) !!}
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
                    </div>
                </div>
            </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

