<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-{{setting('theme_contrast')}}-{{setting('theme_color')}} cus_shadow">

    <!-- Brand Logo -->

    <a href="{{url('dashboard')}}" class="brand-link {{setting('logo_bg_color','bg-white')}}">

        <!--<img src="{{-- {{ url('/') }} --}} /images/logo_default.png" alt="{{setting('app_name')}}" class="brand-image">-->

        <img src="{{$app_logo}}" type="image/png" alt="{{setting('app_name')}}" class="brand-image">

        <span class="brand-text font-weight-light"></span>

    </a>

    <!-- Sidebar -->

    <div class="sidebar">

        <!-- Sidebar Menu -->

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">

                @include('layouts.menu',['icons'=>true])

            </ul>

        </nav>

        <!-- /.sidebar-menu -->

    </div>

    <!-- /.sidebar -->

</aside>

