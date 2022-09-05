@extends('layouts.app')
 <style>
  /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}

#mapcontainer {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
article {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
  </style>

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('Track Order')}}<small class="ml-3 mr-3">|</small><small>{{trans('Track Order')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="">{{trans('Track Order')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('Track Order')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="clearfix"></div>
  <div class="card">
 <div class="card-body">
  <article></article>
</div>
</div>
</div>
@endsection
@push('scripts_lib')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@foreach($track as $key=>$value)
  @php
        $lat = $value['order_lat'] ;
        $log = $value['order_log'] ;
  @endphp
<script> 
function success(position) { 
var mapcanvas = document.createElement('div'); 
mapcanvas.id = 'mapcontainer'; mapcanvas.style.height = '400px'; 
mapcanvas.style.width = '100%'; document.querySelector('article').appendChild(mapcanvas); 
var coords = new google.maps.LatLng( {!! $lat !!} , {!! $log !!} ); 
var options = { zoom: 15, center: coords, mapTypeControl: false, navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL }, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
var map = new google.maps.Map(document.getElementById("mapcontainer"), options); 
var marker = new google.maps.Marker({ position: coords, map: map, title: "You are here!" });
} 
if (navigator.geolocation) 
{ navigator.geolocation.getCurrentPosition(success); } 
else 
{ error('Geo Location is not supported'); }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVsGCajvoSQRExVbBlIREs4aS_99sJ2D4&callback=initMap"></script> 
 @endforeach
@endpush

