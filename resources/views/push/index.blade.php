


@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
 
        <style type="text/css">
            body{
            }
            div.container{
                width: 1000px;
                margin: 0 auto;
                position: relative;
            }
            legend{
                font-size: 30px;
                color: #555;
            }
            .btn_send{
                background: #00bcd4;
            }
            label{
                margin:10px 0px !important;
            }
            textarea{
                resize: none !important;
            }
            .fl_window{
                width: 400px;
                position: absolute;
                right: 0;
                top:100px;
            }
            pre, code {
                padding:10px 0px;
                box-sizing:border-box;
                -moz-box-sizing:border-box;
                webkit-box-sizing:border-box;
                display:block; 
                white-space: pre-wrap;  
                white-space: -moz-pre-wrap; 
                white-space: -pre-wrap; 
                white-space: -o-pre-wrap; 
                word-wrap: break-word; 
                width:100%; overflow-x:auto;
            }
 
        </style>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('In-App Push Notifications')}}<small class="ml-3 mr-3">|</small><small>{{trans('In-App Push Notifications')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{trans('In-App Push Notifications')}}</a>
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
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('In-App Push Notifications')}}</a>
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
            <form class="pure-form pure-form-stacked" action="{{ url('/pushNotifications/send_notification') }}" method="post">
                {{ csrf_field() }}
               
                <fieldset>
                    <legend>Send Notifications Globally</legend>
                    <label for="customer_name">Customer Name</label>
                    <select class="customer_name" id="stacked-state customer_name" name="customer_name">
                        @foreach($users as $key => $data)
                          <option value="{{ $data['name'] }}">{{ $data['name'] }}</option>
                        @endforeach
                    </select>
                    <label for="title1">Title</label>
                    <input type="text" id="title1" name="title" class="pure-input-1-2" placeholder="Enter title">
                    <label for="message1">Message</label>
                    <textarea class="pure-input-1-2" name="message" id="message1" rows="5" placeholder="Notification message!"></textarea>
                    <input type="hidden" name="push_type" value="topic"/>
                     <input type ="hidden" class="device_token" id="device_token" name="device_token" value="">
                    <input type ="hidden" class="customer_id" name="customer_id" value="">
                    <input type ="hidden" class="device_type"  name="device_type" value=" ">
                  
                    <button type="submit" class="pure-button pure-button-primary btn_send">Send</button>
                </fieldset>
            </form>
            </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection
@push('scripts_lib')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endpush

