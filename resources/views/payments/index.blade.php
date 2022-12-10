

@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<style>
   .newImg{
   width: 179px !important;
   height: 182px !important;
   }
   .dash_box p {
   color: #000000!important;
   }
</style>
<section class="content-header content-header{{setting('fixed_header')}}">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>{{trans('lang.payment')}}</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">{{trans('lang.payment')}}</a></li>
               <li class="breadcrumb-item active">{{trans('lang.payment')}}</li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
</section>
<div class="content">
   <!-- Small boxes (Stat box) -->
   <div class="row">
      <div class="col-lg-2 col-6" >
         <!-- small box -->
         <div class="small-box dash_box" id="colorsTiles">
         <div class="inner">
               <p>Admin Commission</p>
               <h3>{{$admin_commission ."%"}}</h3>
            </div>
                      
         </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-4" >
         <!-- small box -->
         <div class="small-box dash_box" id="colorsTiles2">
            <div class="inner">
               <p>{{trans('lang.dashboard_total_earnings')}}</p>
               @if(setting('currency_right',false) != false)
               <h3>{{$earning}}{{setting('default_currency')}}</h3>
               @else
               <h3>{{setting('default_currency')}}{{$earning}}</h3>
               @endif
            </div>
            <div class="icon">
               <i class="fa fa-money"></i>
            </div>            
         </div>
      </div>
      <!-- ./col -->
      <div class="col-md-3 col-6" >
         <!-- small box -->
         <div class="small-box dash_box" id="colorsTiles3">
         <div class="inner">
               <p>Driver Commission</p>
               <h3>{{$driver_commission ."%"}} </h3>
            </div>
            <div class="icon">
               <i class="fa fa-group"></i>
            </div>
         </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-2 col-6" >
         <!-- small box -->
         <div class="small-box dash_box" id="colorsTiles4">
         <div class="inner">
               <p>Profit margin</p>
               <h3>{{ $profit_margin ."%" }}</h3>
            </div>
            <div class="icon">
               <i class="fa fa-cutlery"></i>
            </div>
         </div>
      </div>
      <div class="col-lg-2 col-6" >
         <!-- small box -->
         <div class="small-box dash_box" id="colorsTiles5">
            <div class="inner">
               <p>Net losses</p>
               @if(setting('currency_right',false) != false)
               <h3>{{$netlosses}}{{setting('default_currency')}}</h3>
               @else
               <h3>{{setting('default_currency')}}{{$netlosses}}</h3>
               @endif
            </div>
            <div class="icon">
               <i class="fa fa-group"></i>
            </div>
         </div>
      </div>
      
      <!-- ./col -->
   </div>
   <!-- /.row -->
   <div class="row">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header no-border">
               <div class="row">
                  <div class="col-md-6">
                     <!--<div class="d-flex justify-content-between">  -->
                     <h3 class="card-title">{{trans('lang.earning_plural')}}</h3>
                     <!-- <a href="{!! route('payments.index') !!}">{{trans('lang.dashboard_view_all_payments')}}</a> -->
                     <!-- </div> -->
                  </div>
                  <div class="col-md-6">
                     <div class="rtab">
                        <ul class="nav nav-tabs " role="tablist">
                           <!--<li class="nav-item">-->
                           <!--	<a class="nav-link" data-toggle="tab" href="#tabsearning1" role="tab">Monthly</a>-->
                           <!--</li>-->
                           <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabsearning2" role="tab">Yearly</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabsearning3" role="tab">Monthly</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="tab-content">
                  <div class="tab-pane" id="tabsearning1" role="tabpanel">
                     <div class="d-flex">
                        <p class="d-flex flex-column">
                           @if(setting('currency_right',false) != false)
                           <span class="text-bold text-lg">{{$earning}}{{setting('default_currency')}}</span>
                           @else
                           <span class="text-bold text-lg">{{setting('default_currency')}}{{$earning}}</span>
                           @endif
                           <span>{{trans('lang.dashboard_earning_over_time')}}</span>
                        </p>
                     </div>
                     <div class="position-relative mb-4">
                        <canvas id="sales-chart" height="200"></canvas>
                     </div>
                  </div>
                  <div class="tab-pane" id="tabsearning2" role="tabpanel">
                  </div>
                  <!--<div id="top_x_div" style="width: 100px; height: 300px;"></div>-->
                  <div class="tab-pane active" id="tabsearning3" role="tabpanel">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header no-border">
               <div class="row">
                  <div class="col-md-6">
                     <h3 class="card-title">Order Summary</h3>
                  </div>
                  <!--<div class="col-md-6">
                     <div class="rtab">
                        <ul class="nav nav-tabs " role="tablist">-->
                           <!--<li class="nav-item">-->
                           <!--	<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Daily</a>-->
                           <!--</li>-->
                           <!--<li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">Monthly</a>
                           </li>-->
                          <!-- <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Yearly</a>
                           </li>
                        </ul>
                     </div>-->
                  <!--</div>-->
               </div>
            </div>
            <div class="card-body">
               <div class="tab-content">
                  <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div id="daily_order" style="height:300px; overflow:hidden;"></div>
               </div>
                  <!--<div class="tab-pane active" id="tabs-2" role="tabpanel">
                     <div id="monthly_order" style="height:300px;"></div>
                  </div>-->
                  <div class="tab-pane" id="tabs-3" role="tabpanel">
                     <div id="yearly_order" style="height:300px;"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="row">-->
   <!--    <div class="col-md-8 col-lg-8">-->
   <!--        <div class="card">-->
   <!--             <div class="card-header">-->
   <!--                 <h3 class="card-title">Customers Map</h3>-->
   <!--             </div>-->
   <!--             <div class="card-body">-->
   <!--                 <div class="row">-->
   <!--                     <div class="col-md-4">-->
   <!--                         <div class="m-customers">-->
   <!--                         <table>-->
   <!--                           <tr>-->
   <!--                           <td>-->
   <!--                                <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class="img-fluid rounded" alt="">-->
   <!--                           </td>-->
   <!--                           <td>-->
   <!--                          <h4>James Sukardi</h4>-->
   <!--                          <p>Alexendrai St. London Park</p>-->
   <!--                           </td>-->
   <!--                           </tr>-->
   <!--                            <tr>-->
   <!--                           <td>-->
   <!--                                <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class=" img-fluid rounded" alt="">-->
   <!--                           </td>-->
   <!--                           <td>-->
   <!--                          <h4> Angela Mass</h4>-->
   <!--                          <p> Alexendrai St. London Park</p>-->
   <!--                           </td>-->
   <!--                           </tr>-->
   <!--                           <tr>-->
   <!--                            <td>-->
   <!--                                 <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class="img-fluid rounded" alt="">-->
   <!--                           </td>-->
   <!--                           <td>-->
   <!--                           <h4>James Sukardi</h4>-->
   <!--                           <p>Alexendrai St. London Park</p>-->
   <!--                           </td>-->
   <!--                           </tr>-->
   <!--                           </table>-->
   <!--                           </div>-->
   <!--                     </div>-->
   <!--                     <div class="col-md-8">-->
   <!--                         <div id="map" style="width:100%;height:400px;"></div>-->
   <!--                     </div>-->
   <!--                 </div>-->
   <!--             </div>-->
   <!--        </div>-->
   <!--    </div>-->
   <!--    <div class="col-md-4 col-lg-4">-->
   <!--         <div class="card">-->
   <!--               <div class="card-header">-->
   <!--                    <h3 class="card-title">Recent Customers</h3>-->
   <!--                    <div class="card-tools">-->
   <!--                    
      <!--                </div>-->
   <!--               </div>-->
   <!--               <div class="card-body cus_tbl">-->
   <!--               <table>-->
   <!--               <tr>-->
   <!--               <td>-->
   <!--                    <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class="img-fluid rounded" alt="">-->
   <!--               </td>-->
   <!--               <td>-->
   <!--              <h4>James Sukardi</h4>-->
   <!--              <p>Alexendrai St. London Park</p>-->
   <!--               </td>-->
   <!--               </tr>-->
   <!--                <tr>-->
   <!--               <td>-->
   <!--                    <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class=" img-fluid rounded" alt="">-->
   <!--               </td>-->
   <!--               <td>-->
   <!--              <h4> Angela Mass</h4>-->
   <!--              <p> Alexendrai St. London Park</p>-->
   <!--               </td>-->
   <!--               </tr>-->
   <!--               <tr>-->
   <!--                <td>-->
   <!--                     <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class="img-fluid rounded" alt="">-->
   <!--               </td>-->
   <!--               <td>-->
   <!--               <h4>James Sukardi</h4>-->
   <!--               <p>Alexendrai St. London Park</p>-->
   <!--               </td>-->
   <!--               </tr>-->
   <!--               </table>-->
   <!--               <div class="text-center">-->
   <!--           
      <!--               </div>-->
   <!--              </div>-->
   <!--         </div>-->
   <!--    </div>-->
   <!--</div>-->
   
   
   <!--<div class="row">-->
   <!--          <div class="col-md-12">-->
   <!--              <div class="card">-->
   <!--                  <div class="card-header no-border">-->
   <!--                      <h3 class="card-title">{{trans('lang.fav_menu')}}</h3>-->
   <!--                      <div class="card-tools">-->
   <!--                      </div>-->
   <!--                  </div>-->
   <!--                  <div class="card-body">-->
   <!--                      <div class="row">-->
   <!--                          <div class="col-md-6">-->
   <!--                              <div class="fav_menus">-->
   <!--                                 <img src="{{url('/public/images/restaurant.jpg')}}" alt="" class="img-fluid">-->
   <!--                              </div>-->
   <!--                          </div>-->
   <!--                          <div class="col-md-6">-->
   <!--                          </div>-->
   <!--                      </div>-->
   <!--                      <div class="row">-->
   <!--                          <div class="col-md-12">-->
   <!--                           <div class="tcb-product-slider">-->
   <!--                              <div class="container">-->
   <!--                                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">-->
   <!-- Wrapper for slides -->
   <!--                                      <div class="carousel-inner" role="listbox">-->
   <!--                                          <div class="carousel-item active">-->
   <!--                                              <div class="row">-->
   <!--                                                    {{-- @foreach($restaurants as $restaurant)--}}--> 
   <!--                                                  <div class="col-xs-6 col-sm-3">-->
   <!--                                                      <div class="tcb-product-item">-->
   <!--                                                          <div class="tcb-product-photo">-->
   <!--                                                               <div class="tcb-product-rating">-->
   <!--                                                                  <i class="fa fa-star"></i>-->
   <!--                                                                  <a href="#">{{-- {!! $restaurant->delivery_fee !!} --}}</a>-->
   <!--                                                              </div>-->
   <!--                                                              <div>-->
   <!--                                                           {{-- {!! getMediaColumn($restaurant, 'image','rounded newImg') !!} --}} -->
   <!--                                                             </div>-->
   <!--                                                          </div>-->
   <!--                                                          <div class="tcb-product-info">-->
   <!--                                                              <div class="tcb-product-title">-->
   <!--                                                                  <h4 style="text-align: center;"><a href="#">{{-- {!! $restaurant->name !!} --}}</a></h4>-->
   <!--                                                              </div>-->
   <!--                                                              <div class="tcb-product-price">-->
   <!--                                                                  <div><p style="text-align: center;">{{--₦ {!! $restaurant->admin_commission !!} --}}</p></div>-->
   <!--                                                              </div>-->
   <!--                                                          </div>-->
   <!--                                                      </div>-->
   <!--                                                  </div>-->
   <!--                                                  {{-- @endforeach --}} -->
   <!--                                              </div>-->
   <!--                                          </div>-->
   <!--                                      </div>-->
   <!--                                  </div>-->
   <!--                              </div>-->
   <!--                          </div>-->
   <!--                          </div>-->
   <!--                      </div>-->
   <!--                  </div>-->
   <!--              </div>-->
   <!--          </div>-->
   <!--      </div>-->
</div>
@endsection
@push('scripts_lib')
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@endpush
@push('scripts')
 <script type="text/javascript">
          google.charts.load("current", {packages:["corechart"]});
   
          google.charts.setOnLoadCallback(drawChart);
   
          function drawChart() {
   
            var data = google.visualization.arrayToDataTable([
   
             
   
              ['On Delivery',{{$order_status_yearly['onway']}}],
                ['Delivered',{{$order_status_yearly['completed']}}],
   
              ['Canceled',{{$order_status_yearly['cancelled']}}]
   
            ]);
   
   
   
            var options = {
   
              pieHole: 0.4,
   
            };
   
   
   
            var chart = new google.visualization.PieChart(document.getElementById('daily_order'));
   
            chart.draw(data, options);
   
          }
   
    
</script>

<script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
   
   google.charts.setOnLoadCallback(drawChart);
   
   function drawChart() {
   
     var data = google.visualization.arrayToDataTable([
   
       ['Order', 'Yearly'],
   
       ['Preparing',<?php echo $order_status_yearly['preparing']; ?>],
   
       ['Completed',<?php echo $order_status_yearly['completed']; ?>],
   
       ['Ready',<?php echo $order_status_yearly['ready']; ?>],
   
       ['On The Way',<?php echo $order_status_yearly['onway']; ?>],
   
       ['Delivered',<?php echo $order_status_yearly['delivered']; ?>]
   
     ]);
   
   
   
     var options = {
   
       pieHole: 0.4,
   
     };
   
   
   
     var chart = new google.visualization.PieChart(document.getElementById('yearly_order'));
   
     chart.draw(data, options);
   
   }
   
</script>
<script type="text/javascript">
   var data = [1000, 2000, 3000, 2500, 2700, 2500, 3000, 2300];
   
   var labels = ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'JAN'];
   
   
   
   function renderChart(chartNode, data, labels) {
   
       var ticksStyle = {
   
           fontColor: '#495057',
   
           fontStyle: 'bold'
   
       };
   
   
   
       var mode = 'index';
   
       var intersect = true;
   
       return new Chart(chartNode, {
   
           type: 'bar',
   
           data: {
   
               labels: labels,
   
               datasets: [
   
                   {
   
                       backgroundColor: '#1921FA',
   
                       borderColor: '#1921FA',
   
                       data: data
   
                   }
   
               ]
   
           },
   
           options: {
   
               maintainAspectRatio: false,
   
               tooltips: {
   
                   mode: mode,
   
                   intersect: intersect
   
               },
   
               hover: {
   
                   mode: mode,
   
                   intersect: intersect
   
               },
   
               legend: {
   
                   display: false
   
               },
   
               scales: {
   
                   yAxes: [{
   
                       // display: false,
   
                       gridLines: {
   
                           display: true,
   
                           lineWidth: '4px',
   
                           color: 'rgba(0, 0, 0, .2)',
   
                           zeroLineColor: 'transparent'
   
                       },
   
                       ticks: $.extend({
   
                           beginAtZero: true,
   
   
   
                           // Include a dollar sign in the ticks
   
                           callback: function (value, index, values) {
   
                               @if(setting('currency_right', '0') == '0')
   
                                   return "{{setting('default_currency')}} "+value;
   
                               @else
   
                                   return value+" {{setting('default_currency')}}";
   
                                   @endif
   
   
   
                           }
   
                       }, ticksStyle)
   
                   }],
   
                   xAxes: [{
   
                       display: true,
   
                       gridLines: {
   
                           display: false
   
                       },
   
                       ticks: ticksStyle
   
                   }]
   
               }
   
           }
   
       })
   
   }
   
   
   
   $(function () {
   
       'use strict'
   
   
   
       var $salesChart = $('#sales-chart')
   
       $.ajax({
   
           url: "{!! $ajaxEarningUrl !!}",
   
           success: function (result) {
   
               $("#loadingMessage").html("");
   
               var data = result.data[0];
   
               var labels = result.data[1];
   
               renderChart($salesChart, data, labels)
   
           },
   
           error: function (err) {
   
               $("#loadingMessage").html("Error");
   
           }
   
       });
   
       var salesChart = renderChart($salesChart, data, labels);
   
   })
   
   
   
</script>
<script>
   google.charts.load('current', {'packages':['bar']});
   
   google.charts.setOnLoadCallback(drawStuff);
   
   
   
   function drawStuff() {
   
   var data = new google.visualization.arrayToDataTable([
   
   ['YEARS', 'Amount'],
   
   ["2020", <?php echo $yearnings[0]; ?>],
   
   ["2021", <?php echo $yearnings[1]; ?>],
   
   ["2022", <?php echo $yearnings[2]; ?>],
   
   ["2023", <?php echo $yearnings[3]; ?>],
   
   ['2024', <?php echo $yearnings[4]; ?>]
   
   ]);
   
   
   
   var options = {
   
   title: 'Yearly Earnings',
   
   width: 550,
   
   height: 300,
   
   legend: { position: 'none' },
   
   chart: { title: 'Yearly earnings',
   
            subtitle: 'In Amount' },
   
   bars: 'vertical', // Required for Material Bar Charts.
   
   axes: {
   
     y: {
   
       0: { side: 'top', label: 'AMOUNT IN NAIRA'} // Top x-axis.
   
     }
   
   },
   
   bar: { groupWidth: "90%" }
   
   };
   
   
   
   var chart = new google.charts.Bar(document.getElementById('tabsearning2'));
   
   chart.draw(data, options);
   
   };
   
</script>
<script>
   google.charts.load('current', {'packages':['bar']});
   
   google.charts.setOnLoadCallback(drawStuff);
   
   
   
   function drawStuff() {
   
   var data = new google.visualization.arrayToDataTable([
   
   ['MONTHS', 'Amount'],
   
   ["Jan", <?php echo $mearnings[0]; ?>],
   
   ["Feb", <?php echo $mearnings[1]; ?>],
   
   ["March", <?php echo $mearnings[2]; ?>],
   
   ["April", <?php echo $mearnings[3]; ?>],
   
   ["May", <?php echo $mearnings[4]; ?>],
   
   ["June", <?php echo $mearnings[5]; ?>],
   
   ["July", <?php echo $mearnings[6]; ?>],
   
   ["August", <?php echo $mearnings[7]; ?>],
   
   ["Sept", <?php echo $mearnings[8]; ?>],
   
   ["Oct", <?php echo $mearnings[9]; ?>],
   
   ["Nov", <?php echo $mearnings[10]; ?>],
   
   ["Dec", <?php echo $mearnings[11]; ?>]
   
   ]);
   
   
   
   var options = {
   
   title: 'Yearly Earnings',
   
   width: 550,
   
   height: 300,
   
   legend: { position: 'none' },
   
   chart: { title: 'Monthly earnings',
   
            subtitle: 'In Amount' },
   
   bars: 'vertical', // Required for Material Bar Charts.
   
   axes: {
   
     y: {
   
       0: { side: 'top', label: 'AMOUNT IN NAIRA'} // Top x-axis.
   
     }
   
   },
   
   bar: { groupWidth: "90%" }
   
   };
   
   
   
   var chart = new google.charts.Bar(document.getElementById('tabsearning3'));
   
   chart.draw(data, options);
   
   };
   
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVsGCajvoSQRExVbBlIREs4aS_99sJ2D4&callback=initMap&libraries=places&v=weekly"
   defer
   ></script>
<script>
   // This example requires the Places library. Include the libraries=places
   
   // parameter when you first load the API. For example:
   
   // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
   
   function initMap() {
   
     const map = new google.maps.Map(document.getElementById("map"), {
   
       center: { lat: -33.866, lng: 151.196 },
   
       zoom: 15,
   
     });
   
     const request = {
   
       placeId: "ChIJN1t_tDeuEmsRUsoyG83frY4",
   
       fields: ["name", "formatted_address", "place_id", "geometry"],
   
     };
   
     const infowindow = new google.maps.InfoWindow();
   
     const service = new google.maps.places.PlacesService(map);
   
     service.getDetails(request, (place, status) => {
   
       if (status === google.maps.places.PlacesServiceStatus.OK) {
   
         const marker = new google.maps.Marker({
   
           map,
   
           position: place.geometry.location,
   
         });
   
         google.maps.event.addListener(marker, "click", function () {
   
           infowindow.setContent(
   
             "<div><strong>" +
   
               place.name +
   
               "</strong><br>" +
   
               "Place ID: " +
   
               place.place_id +
   
               "<br>" +
   
               place.formatted_address +
   
               "</div>"
   
           );
   
           infowindow.open(map, this);
   
         });
   
       }
   
     });
   
   }
   
</script>
@endpush