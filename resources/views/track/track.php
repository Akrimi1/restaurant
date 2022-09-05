@extends('layouts.app')

@section('content')

@foreach($track as $key=>$value)
<script src="jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVsGCajvoSQRExVbBlIREs4aS_99sJ2D4&callback=initMap"></script> 
<article></article>
<script> 
function success(position) { 
var mapcanvas = document.createElement('div'); mapcanvas.id = 'mapcontainer'; mapcanvas.style.height = '100%'; mapcanvas.style.width = '100%'; document.querySelector('article').appendChild(mapcanvas); var coords = new google.maps.LatLng( {!! $value['order_lat'] !!} , {!! $value['order_log'] !!} ); 
var options = { zoom: 15, center: coords, mapTypeControl: false, navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL }, mapTypeId: google.maps.MapTypeId.ROADMAP }; 
var map = new google.maps.Map(document.getElementById("mapcontainer"), options); var marker = new google.maps.Marker({ position: coords, map: map, title: "You are here!" });
} if (navigator.geolocation) 
{ navigator.geolocation.getCurrentPosition(success); } 
else { error('Geo Location is not supported'); }
</script>

 @endforeach

@endsection

