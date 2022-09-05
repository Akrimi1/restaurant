@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
        <style>
        .dash_box {
    background-color: #f36f20;
    border-radius: 15px;
    padding: 0px 10px;
}
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
                    <h1>{{trans('lang.dashboard')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{trans('lang.dashboard')}}</a></li>
                        <li class="breadcrumb-item active">{{trans('lang.dashboard')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box dash_box">
                    <div class="inner">
                         <p>{{trans('lang.dashboard_total_orders')}}</p>
                        <h3>{{$ordersCount}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="{!! route('orders.index') !!}" class="small-box-footer">{{trans('lang.dashboard_more_info')}}
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box dash_box">
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
                    <a href="{!! route('payments.index') !!}" class="small-box-footer">{{trans('lang.dashboard_more_info')}}
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box dash_box">
                    <div class="inner">
                        <p>{{trans('lang.dashboard_total_clients')}}</p>
                        <h3>{{$usersCount}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="{!! route('users.index') !!}" class="small-box-footer">{{trans('lang.dashboard_more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box dash_box">
                    <div class="inner">
                        <p>Total Vendors</p>
                        <h3>{{$restaurantsCount}}</h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <a href="{!! route('restaurants.index') !!}" class="small-box-footer">{{trans('lang.dashboard_more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
       
            <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!--        <div class="row">-->
        <!--    <div class="col-lg-6">-->
        <!--        <div class="card">-->
        <!--            <div class="card-header no-border">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-6">-->
                                 <!--<div class="d-flex justify-content-between">  -->
        <!--                    <h3 class="card-title">{{trans('lang.earning_plural')}}</h3>-->
                           <!-- <a href="{!! route('payments.index') !!}">{{trans('lang.dashboard_view_all_payments')}}</a> -->
                       <!-- </div> -->
        <!--                    </div>-->
        <!--                    <div class="col-md-6">-->
        <!--                    <div class="rtab">-->
        <!--                       <ul class="nav nav-tabs " role="tablist">-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link active" data-toggle="tab" href="#tabsearning1" role="tab">Daily</a>-->
        <!--                    	</li>-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link" data-toggle="tab" href="#tabsearning1" role="tab">Monthly</a>-->
        <!--                    	</li>-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link" data-toggle="tab" href="#tabsearning1" role="tab">Yearly</a>-->
        <!--                    	</li>-->
        <!--                      </ul>-->
        <!--                      </div>-->
        <!--                      </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="card-body">-->
        <!--                 <div class="tab-content">-->
        <!--                     <div class="tab-pane active" id="tabsearning1" role="tabpanel">-->
        <!--                <div class="d-flex">-->
        <!--                    <p class="d-flex flex-column">-->
        <!--                        @if(setting('currency_right',false) != false)-->
        <!--                            <span class="text-bold text-lg">{{$earning}}{{setting('default_currency')}}</span>-->
        <!--                        @else-->
        <!--                            <span class="text-bold text-lg">{{setting('default_currency')}}{{$earning}}</span>-->
        <!--                        @endif-->
        <!--                        <span>{{trans('lang.dashboard_earning_over_time')}}</span>-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--                <div class="position-relative mb-4">-->
        <!--                <canvas id="sales-chart" height="200"></canvas>-->
        <!--                </div>-->
        <!--                </div>-->
        <!--                <div class="tab-pane active" id="tabsearning2" role="tabpanel">-->
                            
        <!--                </div>-->
        <!--                <div class="tab-pane active" id="tabsearning3" role="tabpanel">-->
        <!--                </div>-->
        <!--                </div>-->
        <!--            </div>-->
                           
              
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="col-lg-6">-->
        <!--        <div class="card">-->
        <!--            <div class="card-header no-border">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-6">-->
        <!--                        <h3 class="card-title">Order Summary</h3>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-6">-->
        <!--                       <div class="rtab">-->
        <!--                       <ul class="nav nav-tabs " role="tablist">-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Daily</a>-->
        <!--                    	</li>-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Monthly</a>-->
        <!--                    	</li>-->
        <!--                    	<li class="nav-item">-->
        <!--                    		<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Yearly</a>-->
        <!--                    	</li>-->
        <!--                      </ul>-->
        <!--                      </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="card-body">-->
        <!--                <div class="tab-content">-->
        <!--                  <div class="tab-pane active" id="tabs-1" role="tabpanel">-->
        <!--                    <div id="daily_order" style="height:300px; overflow:hidden;"></div>-->
        <!--                  </div>-->
        <!--                  <div class="tab-pane" id="tabs-2" role="tabpanel">-->
        <!--                       <div id="monthly_order" style="height:300px;"></div>-->
        <!--                  </div>-->
        <!--                   <div class="tab-pane" id="tabs-3" role="tabpanel">-->
        <!--                       <div id="yearly_order" style="height:300px;"></div>-->
        <!--                  </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
              <div class="col-lg-12">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Vendors</h3>
                        <div class="card-tools">
                            <a href="{{route('restaurants.index')}}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              
                                <th>Name</th>
                           
                                 <th>Email</th>
                                 <th>Phone</th>
                                     <th>Category</th>
                                      <th>Time</th>
                                       <th>Working Days</th>
                                       <th>Status</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                
                            @foreach($restaurants as $restaurants)
                            
                             @php  $working_days =$restaurants->working_days;
                             
                             $active = $restaurants->active;
                             
                             if($active == 1)
                             {
                             
                             $active = "Avaliable";
                             
                             }
                             else
                             {
                             
                             $active = "Not Availiable";
                             
                             }
                             
                            
                             
                             if(!empty($working_days))
                             {
                            
                         $working_days = implode(',', $working_days);
                             }
                             
                             @endphp
                             

                                <tr>
                                  <td>{!! $restaurants->name !!}</td>
                                      <td>{!! $restaurants->email !!}</td>
                                    <td>{!! $restaurants->phone !!}</td>
                                            <td>{!! $restaurants->category !!}</td>
                                               <td>{!! $restaurants->opening_time !!} - {!! $restaurants->closing_time !!}</td>
                                               <td>{!! $working_days !!}</td>
                                             
                                <td>{!! $active !!}</td>
                         
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
       <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Users</h3>
                        <div class="card-tools">
                            <a href="{{route('restaurants.index')}}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              
                                <th>Id</th>
                                <th>Profile</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                     <th>Phone</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $users)

                                <tr>
                                    
                                  <td>{!! $users->id !!}</td>
                                     <td> <img src="http://92.42.110.51/~karri/api/assets/customer/{!! $users->profile !!}" height="30px" width="30px"></td>
                                    <td>{!! $users->name !!}</td>
                                            <td>{!! $users->email !!}</td>
                                               <td>{!! $users->phone !!}</td>
                               
                         
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                   <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Orders</h3>
                        <div class="card-tools">
                            <a href="{{route('restaurants.index')}}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              
                                <th>Restaurant</th>
                                <th>Food</th>
                                 <th>Price</th>
                                 <th>Time</th>
                                     <th>Hint</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $orders)

                                <tr>
                                    
                                  <td>{!! $orders->restaurant_name !!}</td>
                                      <td>{!! $orders->food_description !!}</td>
                                       <td>{!! $orders->food_price !!}</td>
                                    <td>{!! $orders->time !!}</td>
                                            <td>{!! $orders->hint !!}</td>
                                              

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
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
          ['Order', 'Daily'],
          ['On Delivery',11],
          ['Delivered',2],
          ['Canceled',7]
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
          ['Order', 'Monthly'],
          ['On Delivery',11],
          ['Delivered',2],
          ['Canceled',7]
        ]);

        var options = {
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('monthly_order'));
        chart.draw(data, options);
      }
</script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Yearly'],
          ['On Delivery',11],
          ['Delivered',2],
          ['Canceled',7]
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
            //var salesChart = renderChart($salesChart, data, labels);
        })

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

