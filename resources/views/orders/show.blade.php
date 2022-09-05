


@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{trans('lang.order_plural')}}<small class="ml-3 mr-3">|</small><small>{{trans('lang.order_desc')}}</small></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> {{trans('lang.dashboard')}}</a></li>
          <li class="breadcrumb-item"><a href="{!! route('orders.index') !!}">{{trans('lang.order_plural')}}</a>
          </li>
          <li class="breadcrumb-item active">{{trans('lang.order')}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="card">
    <div class="card-header d-print-none">
      <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
        <li class="nav-item">
          <a class="nav-link" href="{!! route('orders.index') !!}"><i class="fa fa-list mr-2"></i>{{trans('lang.order_table')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{!! url()->current() !!}"><i class="fa fa-plus mr-2"></i>{{trans('lang.order')}}</a>
        </li>
        <div class="ml-auto d-inline-flex">
          <li class="nav-item">
            <a class="nav-link pt-1" id="printOrder" href="#"><i class="fa fa-print"></i> {{trans('lang.print')}}</a>
          </li>
        </div>
      </ul>
    </div>
    <div class="card-body">
             <div class="row"> 
     <div class="col-md-8">
       
        <div id="map" style="width:100%;height:400px;"></div>
     </div>
     <div class="col-md-4">
         <div class="delivery_status">
              <h4>On Delivery</h4>
              <p>Expected time: {!! $order->time !!}</p>
         </div>
         <div class="customer_info">
             <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" style="width: 50px;" class="img-fluid rounded" alt="">
             <h4>{!! $order->user->name !!}</h4>
             <h5>{!! isset($order->user->custom_fields['phone']) ? $order->user->custom_fields['phone']['view'] : "" !!}</h5>
             <p>Customer</p>
         </div>
     </div>
     </div>
      <div class="row food_details">
      <div class="col-md-3">
          <div class="history_box">
          <h4>History</h4>
          <div class="history-tl-container">
            <ul class="tl">
            <li class="tl-item" ng-repeat="item in retailer_history">
              <div class="item-title">{!! $order->order_status_id  !!}</div>
              <div class="timestamp">
                {!! $order->updated_at !!}<br> {!! $order->time !!}
              </div>
            </li>

          </ul>
        </div>
        </div>
      </div>
      <div class="col-md-9">
         <div class="row">
             <div class="col-md-12">
                 <div class="card-header">
                 <h4>Items</h4>
                 </div>
                 <div class="food_info">
                     <div class="row">
               
                         <div class="col-md-11">
                             <h5>Orders Details<h5>
                             <h4>{!! $order->food_description !!}</h4>
                             <p>Food Status: <span style="color:blue">{!! $order->orderstatus_id  !!}</span></p>
                              <p>Payment Method: <span style="color:blue">{!! isset($order->payment) ? $order->payment->method : ''  !!}</span></p>
                               <p>Payment Status: <span style="color:blue">{!! isset($order->payment) ? $order->payment->status : trans('lang.order_not_paid')  !!}</span></p>
                                <p>Total Payment: <span style="color:blue">{!!getPrice($total)!!}</span></p>
                          
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
        <div class="col-md-12">
        <div class="table-responsive table-light">
          <table class="table">
            <tbody><tr>
              <th class="">{{trans('lang.order_subtotal')}}</th>
              <td>{!! getPrice($subtotal) !!}</td>
            </tr>
            <tr>
              <th class="">{{trans('lang.order_delivery_fee')}}</th>
              <td>{!! getPrice($order['delivery_fee'])!!}</td>
            </tr>
            <tr>
              <th class="">{{trans('lang.order_tax')}} ({!!$order->tax!!}%) </th>
              <td>{!! getPrice($taxAmount)!!}</td>
            </tr>

            <tr>
              <th class="">{{trans('lang.order_total')}}</th>
              <td>{!!getPrice($total)!!}</td>
            </tr>
            </tbody></table>
        </div>
        </div>
        </div>
      </div>
      <!--<div class="col-md-4">-->
      <!--    <div class="delivery_box">-->
      <!--      <div class="delivery_info">-->
      <!--      <div class="row">-->
      <!--      <div class="col-md-3">-->
      <!--      <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" class="img-fluid rounded" alt="">-->
      <!--      </div>-->
      <!--      <div class="col-md-9">-->
      <!--       <h4>James Mustafa</h4>-->
      <!--       <p>Delivery Rider</p>-->
      <!--       </div>-->
      <!--       </div>-->
      <!--       </div>-->
      <!--       <div class="s_ico">-->
      <!--           <div class="row">-->
      <!--               <div class="col-md-2">-->
      <!--                   <i class="fa fa-phone"></i>-->
      <!--               </div>-->
      <!--               <div class="col-md-10">-->
      <!--                   <div class="s_title">Telephone</div>-->
      <!--                   <div class="s_description">021 2346 664</div> -->
      <!--               </div>-->
      <!--           </div>-->
      <!--       </div>-->
      <!--       <div class="s_ico">-->
      <!--           <div class="row">-->
      <!--               <div class="col-md-2">-->
      <!--                   <i class="fa fa-envelope-open"></i>-->
      <!--               </div>-->
      <!--               <div class="col-md-10">-->
      <!--                    <div class="s_title">Email</div>-->
      <!--                    <div class="s_description">jamesmustafa@mail.com</div>-->
      <!--               </div>-->
      <!--           </div>-->
      <!--       </div>-->
      <!--    </div>-->
      <!--</div>-->

      </div>

      <div class="clearfix"></div>
      <div class="row d-print-none">
        <!-- Back Field -->
        <div class="form-group col-12 text-right">
          <a href="{!! route('orders.index') !!}" class="btn btn-default"><i class="fa fa-undo"></i> {{trans('lang.back')}}</a>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
    function initMap() {
  const myLatlng = { lat: {!! $order->order_lat !!}, lng: {!! $order->order_log !!} };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 4,
    center: myLatlng,
  });
  // Create the initial InfoWindow.
  let infoWindow = new google.maps.InfoWindow({
    content: "Order Received",
    position: myLatlng,
  });
  infoWindow.open(map);
  // Configure the click listener.
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    infoWindow.setContent(
      JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
    );
    infoWindow.open(map);
  });
}
// function myMap() {
// var mapProp= {
//   center:new google.maps.LatLng({!! $order->order_lat !!},{!! $order->order_log !!}),
//   zoom:5,
// };
// var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
// }
// </script>
//      
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVsGCajvoSQRExVbBlIREs4aS_99sJ2D4&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
//   <script type="text/javascript">
//     $("#printOrder").on("click",function () {
//       window.print();
//     });
  </script>

  
@endpush

