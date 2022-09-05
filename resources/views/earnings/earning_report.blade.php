@extends('layouts.app')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.earning_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('Earning Report')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/earnings/earning_report')}}">{{trans('Earnings Report ')}}</a>
          </li>
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
	    <div class="row">
		<div class="col-md-6">
        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-list mr-2"></i>{{trans('Earnings')}}</a>
        </li>
        </ul>
		</div>
		<div class="col-md-6 text-right">
		        <div class="list-group" id="list-tab" role="tablist">
				  <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Daily</a>
				  <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Monthly</a>
				  <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Yearly</a>
                </div>
		</div>
		</div>
    </div>
    <div class="card-body">
	  <div class="row">
	       <div class="col-md-4">
		       <h5>Daily Earnings</h5>
		       <div id="earningdLineChart"></div>
		   </div>
		   <div class="col-md-4">
		       <h5>Monthly Earnings</h5>
		       <div id="earningmLineChart"></div>
		   </div>
		   <div class="col-md-4">
		       <h5>Yearly Earnings</h5>
		       <div id="earningyLineChart"></div>
		   </div>
	   </div>
	   
	 <!--  <div class="row">
	       <div class="col-md-12">
           <!-- <div id="earning_daily" style="width: 900px; height: 500px;"></div> -->
		    <!--@foreach($earnings as $earning)
				{{$earning->total_earning}}
			    {{\Carbon\Carbon::parse($earning->created_at)->format('M')}}
			@endforeach
			<div>
			       @foreach($monthly as $month) 
                    <tr>
                        <td>{{$month->total}}</td>
                        <td>{{$month->year}}</td>
                        <td>{{$month->month}}</td>
                    </tr>
                @endforeach
			</div> -->
           
		<!--   </div>
	  </div> -->
	  <div class="row">
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
	      <div id="earning_daily" style="width:800px; height: 500px;"></div>
	  </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
	      <div id="earning_monthly" style="width:800px; height: 500px;"></div>
	  </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
	      <div id="earning_yearly" style="width:800px; height: 500px;"></div>
	  </div>
    </div>
  </div>
  <div class="col-md-4"></div>
  <div class="clearfix"></div>
</div>
</div>
</div>
</div>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.arrayToDataTable([
      ['Date', 'Earning'],
          
        @php	 
         foreach($daily as $day) {
                  echo "['".\Carbon\Carbon::parse($day->dates)->format('d M')."', ".$day->total."],";
              }
         @endphp
      
        ]);

      var options = {
        hAxis: {
          title: 'Date'
        },
        vAxis: {
          title: 'Earning'
        },
        backgroundColor: '#fff'
      };

      var chart = new google.visualization.LineChart(document.getElementById('earningdLineChart'));
      chart.draw(data, options);
    }
</script>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.arrayToDataTable([
      ['Month', 'Earning'],
         @php
              foreach($monthly as $month) {
                echo "['".$month->month." ".$month->year."', ".$month->total."],";
              }
          @endphp
        ]);

      var options = {
        hAxis: {
          title: 'Month',
		 // textStyle: { fontSize: 14, bold: 'true'}
        },
        vAxis: {
          title: 'Earning',
		  // textStyle: { fontSize: 14, bold: 'true'}
        },
		
        backgroundColor: '#fff'
      };

      var chart = new google.visualization.LineChart(document.getElementById('earningmLineChart'));
      chart.draw(data, options);
    } 
</script>
<script>
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.arrayToDataTable([
      ['Year', 'Earning'],
         @php
              foreach($yearly as $year) {
                  echo "['".$year->year."', ".$year->total."],";
              }
          @endphp
        ]);

      var options = {
        hAxis: {
          title: 'Year'
        },
        vAxis: {
          title: 'Earning'
        },
        backgroundColor: '#fff'
      };

      var chart = new google.visualization.LineChart(document.getElementById('earningyLineChart'));
      chart.draw(data, options);
    } 
</script>
<script>
  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Earning'],
          @php
              foreach($daily as $day) {
                  echo "['".\Carbon\Carbon::parse($day->dates)->format('d M y')."', ".$day->total."],";
              }
          @endphp
        ]);

        var options = {
          chart: {
            title: 'Daily Earning'
          },
          bars: 'vertical', 
		   vAxis: {
          title: 'Earning'
        }
        };

        var chart = new google.charts.Bar(document.getElementById('earning_daily'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
	 
</script>
<script>
  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Earning'],
           @php
              foreach($monthly as $month) {
                echo "['".$month->month." ".$month->year."', ".$month->total."],";
              }
          @endphp
        ]);

        var options = {
		      chartArea: {top: 30, left: 80, width: 490, height: 300},
              height: 500,
              width: 710,
              legend: {position: 'right', alignment: 'start'},
              sizeAxis: {maxSize: 20},
          chart: {
            title: 'Monthly Earning'
          },
          bars: 'vertical', 
		   vAxis: {
          title: 'Earning'
        },
		hAxis: {
          title: 'Month'
        }
        };
        var chart = new google.charts.Bar(document.getElementById('earning_monthly'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
<script>
  google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Earning'],
           @php
              foreach($yearly as $year) {
                  echo "['".$year->year."', ".$year->total."],";
              }
          @endphp
        ]);

        var options = {
          chart: {
            title: 'Yearly Earning'
          },
          bars: 'vertical', 
		   vAxis: {
          title: 'Earning'
        }
        };

        var chart = new google.charts.Bar(document.getElementById('earning_yearly'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>

@endsection

