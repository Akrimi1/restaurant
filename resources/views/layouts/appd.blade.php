<!DOCTYPE html>

<html lang="{{setting('language','en')}}" dir="ltr">

<head>

    <meta charset="UTF-8">

    <title>Karri</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="icon" type="image/png" href="{{asset('images/icons/app-icon.png')}}"/>

    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css" integrity="sha512-6mc0R607di/biCutMUtU9K7NtNewiGQzrvWX4bWTeqmljZdJrwYvKJtnhgR+Ryvj+NRJ8+NnnCM/biGqMe/iRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />





 <!-- for datatable -->

     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

  <!-- <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>

    <script src="js/plugins-init/datatables.init.js"></script> -->





    <!-- Ionicons -->

{{--<link href="https://unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css" rel="stylesheet">--}}

{{--<!-- iCheck -->--}}

{{--<link rel="stylesheet" href="{{asset('plugins/iCheck/flat/blue.css')}}">--}}

{{--<!-- select2 -->--}}

{{--<link rel="stylesheet" href="{{asset('plugins/select2/select2.min.css')}}">--}}

<!-- Morris chart -->

{{--<link rel="stylesheet" href="{{asset('plugins/morris/morris.css')}}">--}}

<!-- jvectormap -->

{{--<link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">--}}

<!-- Date Picker -->

<link rel="stylesheet" href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

<!-- Daterange picker -->

{{--<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker-bs3.css')}}">--}}

{{--<!-- bootstrap wysihtml5 - text editor -->--}}

{{--<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">--}}



@stack('css_lib')

<!-- Theme style -->

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/bootstrap-sweetalert/sweetalert.css')}}">

    {{--<!-- Bootstrap -->--}}

    {{--<link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">--}}



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('css/'.setting('theme_color','primary').'.css')}}">

    @yield('css_custom')

</head>



<?php $user_id = e(Auth::user()->id);



$role_id = DB::table('users')->select('role_id')->where('id', $user_id)->first();



   $role_id=$role_id->role_id;

 

   

  $admin_notification_count =DB::table('notifications')->where('not_admin_status', 0)->count('id');

  

  

  if($role_id == "3")

  {

  

  $manager_notification_count = DB::table('notifications')->where('not_manager_status', 0)->where('manager_id', $user_id)->count('id');

 

  }

  if($role_id == "4")

  {

     $restaurant_notification_count = DB::table('notifications')->where('not_restaurant_status', 0)->where('restaurant_id', $user_id)->count('id'); 

      

  }



?>



<body style="height: 100%; background-color: #f9f9f9;" class="hold-transition sidebar-mini {{setting('theme_color')}}">

@if(auth()->check())

    <div class="wrapper">

        <!-- Main Header -->

        <!-- Navbar -->

        <nav class="main-header navbar navbar-expand {{setting('fixed_header','')}} {{setting('nav_color','navbar-light bg-white')}}">

            <!-- Left navbar links -->

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" data-widget="pushmenu" href="#" style="color:#000!important;"><i class="fa fa-bars"></i></a>

                </li>

                <li class="nav-item d-none d-sm-inline-block">

                    <a href="{{url('dashboard')}}" class="nav-link " style="color: #262626!important; font-weight: 600; font-size: 25px; line-height: 25px;">{{trans('lang.dashboard')}}</a>

                </li>

            </ul>



            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                @if(env('APP_CONSTRUCTION',false))

                    <li class="nav-item">

                        <a class="nav-link text-danger" href="#"><i class="fa fa-info-circle"></i>

                            {{env('APP_CONSTRUCTION','') }}</a>

                    </li>

                @endif

              <!--  @can('carts.index')

                    <li class="nav-item">

                        <a class="nav-link {{ Request::is('carts*') ? 'active' : '' }}" href="{!! route('carts.index') !!}"><i class="fa fa-shopping-cart"></i></a>

                    </li>

                @endcan -->

                <li>

                    <form action="{{ url('/search')}}" method="GET" role="search">

                        {{ csrf_field() }}

                        <div class="input-group no-border t_search">

                            <input type="text" class="form-control" name="q"

                                placeholder="Search Orders " required> <span class="input-group-btn">

                                <button type="submit" class="btn btn-default" style="height: 36px;">

                                    <i class="fa fa-search"></i>

                                </button>

                            </span>

                        </div>

                    </form>

                    <!--<form action="/search" method="POST" role="search">-->

                    <!--     {{ csrf_field() }}-->

                    <!--    <div class="input-group no-border t_search">-->

                    <!--        <input type="text" value="" name="q" class="form-control" placeholder=" ">-->

                    <!--        <div class="input-group-append">-->

                    <!--         <div class="input-group-text">-->

                    <!--           <i class="fa fa-search"></i>-->

                    <!--         </div>-->

                    <!--       </div>-->

                    <!--    </div>-->

                    <!--</form>-->

                </li>

                        @if($user_id == 1)

                <li class="nav-item">

                  <a class="nav-link" href="{!! url('/enquiry') !!}"><i class="fa fa-commenting-o"></i></a>

                </li>

                      @endif

                            @if($user_id == 1)

                @can('notifications.index')

                    <li class="nav-item">

                        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}" href="{!! route('notifications.index') !!}"><i class="fa fa-bell-o"></i><span class="counter">{{ $admin_notification_count }}+</span></a>

                    </li>

                @endcan

                   @endif

                      @if($role_id == '3')

                        <li class="nav-item">

                        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}" href="{!! url('/notificationsManager') !!}"><i class="fa fa-bell-o"></i><span class="counter">{{ $manager_notification_count }}+</span></a>

                    </li>

                       @endif

                           @if($role_id == '4')

                        <li class="nav-item">

                        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}" href="{!! url('/notificationsRestaurant') !!}"><i class="fa fa-bell-o"></i><span class="counter">{{ $restaurant_notification_count }}+</span></a>

                    </li>

                       @endif

                @if($user_id == 1)

                <li class="nav-item">

                  <a class="nav-link" href="{!! url('/settings/app/globals') !!}"><i class="fa fa-cog"></i></a>

                </li>

                @endif

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <img src="{{auth()->user()->getFirstMediaUrl('avatar','icon')}}" class="brand-image mx-2 rounded" style="max-height:30px!important;" alt="User Image">

                        <i class="fa fa fa-angle-down"></i> {!! auth()->user()->name !!}



                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="{{route('users.profile')}}" class="dropdown-item"> <i class="fa fa-user mr-2"></i> {{trans('lang.user_profile')}} </a>

                        <div class="dropdown-divider"></div>

                        <a href="{!! url('/logout') !!}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                            <i class="fa fa-envelope mr-2"></i> {{__('auth.logout')}}

                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">

                            {{ csrf_field() }}

                        </form>

                    </div>

                </li>

            </ul>

        </nav>


 
        <!-- Left side column. contains the logo and sidebar -->

    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            @yield('content')

        </div>



        <!-- Main Footer -->

        <footer class="main-footer {{setting('fixed_footer','')}}">

            <div class="float-right d-none d-sm-block">



            </div>

            <strong>Copyright © {{date('Y')}} <a href="{{url('/')}}">Karri</a>.</strong> All rights reserved.

        </footer>



    </div>

@else

    <nav class="nmain-header navbar navbar-expand {{setting('nav_color','navbar-light bg-white')}} border-bottom">

        <div class="container">

            <!-- Left navbar links -->

            <ul class="navbar-nav">

                <li class="nav-item">

                    <a class="nav-link" href="{!! url('/') !!}">{{setting('app_name')}}</a>

                </li>

                @include('layouts.menu',['icons'=>false])

            </ul>



            <!-- Right navbar links -->

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">

                    <a class="nav-link" data-toggle="dropdown" href="#">

                        {!! Auth::user()->name !!}

                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="{{route('users.profile')}}" class="dropdown-item"> <i class="fa fa-user mr-2"></i> Profile </a>

                        <div class="dropdown-divider"></div>

                        <a href="{!! url('/logout') !!}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                            <i class="fa fa-envelope mr-2"></i> {{__('auth.logout')}}

                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">

                            {{ csrf_field() }}

                        </form>

                    </div>

                </li>

            </ul>

        </div>

    </nav>



    <div id="page-content-wrapper">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    @yield('content')

                </div>

            </div>

            <!-- Main Footer -->

            <footer class="{{setting('fixed_footer','')}}">

                <div class="float-right d-none d-sm-block">

                    <b>Version</b> {{implode('.',str_split(substr(config('installer.currentVersion','v100'),1,3)))}}

                </div>

                <strong>Copyright © {{date('Y')}} <a href="{{url('/')}}">Karri</a>.</strong> All rights reserved.

            </footer>

        </div>

    </div>



    @endrole





    <!-- jQuery -->

    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <!-- jQuery UI 1.11.4 -->

    {{--<script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js')}}"></script>--}}

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    {{--<script>--}}

    {{--$.widget.bridge('uibutton', $.ui.button)--}}

    {{--</script>--}}

    <!-- Bootstrap 4 -->

    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>



    <!-- The core Firebase JS SDK is always required and must be listed first -->

    <script src="{{asset('https://www.gstatic.com/firebasejs/7.2.0/firebase-app.js')}}"></script>



    <script src="{{asset('https://www.gstatic.com/firebasejs/7.2.0/firebase-messaging.js')}}"></script>



    <script type="text/javascript">@include('vendor.notifications.init_firebase')</script>



    <script type="text/javascript">

        const messaging = firebase.messaging();

        navigator.serviceWorker.register("{{url('firebase/sw-js')}}")

            .then((registration) => {

                messaging.useServiceWorker(registration);

                messaging.requestPermission()

                    .then(function() {

                        console.log('Notification permission granted.');

                        getRegToken();



                    })

                    .catch(function(err) {

                        console.log('Unable to get permission to notify.', err);

                    });

                messaging.onMessage(function(payload) {

                    console.log("Message received. ", payload);

                    notificationTitle = payload.data.title;

                    notificationOptions = {

                        body: payload.data.body,

                        icon: payload.data.icon,

                        image:  payload.data.image

                    };

                    var notification = new Notification(notificationTitle,notificationOptions);

                });

            });



        function getRegToken(argument) {

            messaging.getToken().then(function(currentToken) {

                if (currentToken) {

                    saveToken(currentToken);

                    console.log(currentToken);

                } else {

                    console.log('No Instance ID token available. Request permission to generate one.');

                }

            })

                .catch(function(err) {

                    console.log('An error occurred while retrieving token. ', err);

                });

        }





        function saveToken(currentToken) {

            $.ajax({

                type: "POST",

                data: {'device_token': currentToken, 'api_token': '{!! auth()->user()->api_token !!}'},

                url: '{!! url('api/users',['id'=>auth()->id()]) !!}',

                success: function (data) {



                },

                error: function (err) {

                    console.log(err);

                }

            });

        }

    </script>



    <!-- Sparkline -->

    {{--<script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>--}}

    {{--<!-- iCheck -->--}}

    {{--<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>--}}

    {{--<!-- select2 -->--}}

    {{--<script src="{{asset('plugins/select2/select2.min.js')}}"></script>--}}

    <!-- jQuery Knob Chart -->

    {{--<script src="{{asset('plugins/knob/jquery.knob.js')}}"></script>--}}

    <!-- daterangepicker -->

    {{--<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js')}}"></script>--}}

    {{--<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>--}}

    <!-- datepicker -->

    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Bootstrap WYSIHTML5 -->

    {{--<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}

    <!-- Slimscroll -->

    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <!-- FastClick -->

    {{--<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>--}}

    @stack('scripts_lib')

    <!-- AdminLTE App -->

    <script src="{{asset('dist/js/adminlte.js')}}"></script>

    {{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}

    {{--<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>--}}

    <!-- AdminLTE for demo purposes -->

    <script src="{{asset('dist/js/demo.js')}}"></script>



    <script src="{{asset('js/scripts.js')}}"></script>

    @stack('scripts')





<!-- for datatable -->





<script>

$(document).ready(function() {

    $('#example').DataTable( {

        dom: 'Bfrtip',

        buttons: [

            'copy', 'csv', 'excel', 'pdf', 'print'

        ]

    } );

} );

</script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>







</body>

</html>

