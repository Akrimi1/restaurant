



<?php $user_id = e(Auth::user()->id);



$role_id = DB::table('users')->select('role_id')->where('id', $user_id)->first();



   $role_id=$role_id->role_id;



            $manager_counter = DB::table('orders')

            ->select('orders*')

            ->where('manager_id', $user_id)

            ->where('ManagerorderView_status', '0')

            ->count();

            

            $admin_counter = DB::table('orders')

            ->select('orders*')

            ->where('AdminorderView_status','0')

            ->count();

            

            $restaurant_counter = DB::table('orders')

            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')

            ->join('users', 'users.email', '=', 'restaurants.email')

            ->where('users.id', $user_id)

            ->where('RestaurantorderView_status', '0')

            ->select('orders*')

            ->count();

            

            $adminSupport_counter = DB::table('support')

            ->select('support*')

            ->where('support_status','0')

            ->count();

?>





@if($user_id == 1)





@can('dashboard')

    <li class="nav-item">

        <a class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}" href="{!! url('dashboard') !!}">@if($icons)

                <i class="nav-icon fa fa-dashboard"></i>@endif

            <p>{{trans('lang.dashboard')}}</p></a>

    </li>

@endcan







<!--@can('favorites.index')-->

<!--    <li class="nav-item">-->

<!--        <a class="nav-link {{ Request::is('favorites*') ? 'active' : '' }}" href="{!! route('favorites.index') !!}">@if($icons)-->

<!--                <i class="nav-icon fa fa-heart"></i>@endif<p>{{trans('lang.favorite_plural')}}</p></a>-->

<!--    </li>-->

<!--@endcan-->







  <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/manager_details')}}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Managers')}}</p>

		 </a>

  </li>



<!--<li class="nav-header">{{trans('Restaurant Management')}}</li>-->



@endif

@if($role_id == "3")

  <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/managerDashboard')}}">

            <i class="nav-icon fa fa-dashboard"></i><p>{{trans('Manager Dashboard')}}</p>

		 </a>

  </li>

@endif

   <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/liveOrderTrack')}}">

            <i class="nav-icon fa fa-map-marker"></i><p>{{trans('Live Tracking')}}</p>

		 </a>

  </li>

@if($role_id == "1" || $role_id == "2" || $role_id == "3")



@can('restaurants.index')

    <li class="nav-item has-treeview {{ (Request::is('restaurants*') || Request::is('requestedRestaurants*') || Request::is('galleries*') || Request::is('restaurantReviews*')) && !Request::is('restaurantsPayouts*') ? 'menu-open' : '' }}">

        <a href="{!! route('restaurants.index') !!}" class="nav-link {{ (Request::is('restaurants*') || Request::is('requestedRestaurants*') || Request::is('galleries*') || Request::is('restaurantReviews*')) && !Request::is('restaurantsPayouts*')? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-cutlery"></i>@endif

            <p>{{trans('Vendors')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>





        <ul class="nav nav-treeview">







             <!--@can('restaurants.index')-->

              @if($user_id == 1)

              

              

    <!--           <li class="{{ Request::is('about') ? 'active' : '' }}">-->

    <!--    <a href="{{ url('about') }}">About Us</a>-->

    <!--</li>-->

              

                <li class="nav-item">





                    <a class="nav-link {{ Request::is('restaurants/add_vendors_details') ? 'active' : '' }}" href="{!! url('restaurants/add_vendors_details') !!}">@if($icons)



                            <i class="nav-icon fa fa-cutlery"></i>@endif<p>{{trans('Add Category')}}</p></a>

                </li>





                <li class="nav-item">





                    <a class="nav-link {{ Request::is('show_vendors') ? 'active' : '' }}" href="{!! url('show_vendors') !!}">@if($icons)



                            <i class="nav-icon fa fa-cutlery"></i>@endif<p>{{trans('Show Categories')}}</p></a>

                </li>

@endif

          

            <!--@endcan-->



            <!--<li class="nav-item">-->

            <!--        <a class="nav-link {{ Request::is('restaurants*') ? 'active' : '' }}" href="{!! url('restaurants/vendors') !!}">@if($icons)-->

            <!--                <i class="nav-icon fa fa-cutlery"></i>@endif<p>{{trans('vendor add')}}</p></a>-->

            <!--    </li>-->

            

              @if($user_id == 1)



    <li class="nav-item">

        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! route('categories.index') !!}">@if($icons)

                <i class="nav-icon fa fa-folder"></i>@endif<p>{{trans('Vendor Category')}}</p></a>

                </li>

                @endif

            @can('restaurants.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('restaurants') ? 'active' : '' }}" href="{!! route('restaurants.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-cutlery"></i>@endif<p>{{trans('Show Vendors')}}</p></a>

                </li>

            @endcan

            <!--@can('galleries.index')-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link {{ Request::is('galleries*') ? 'active' : '' }}" href="{!! route('galleries.index') !!}">@if($icons)-->

            <!--                <i class="nav-icon fa fa-image"></i>@endif<p>{{trans('lang.gallery_plural')}}</p></a>-->

            <!--    </li>-->

            <!--@endcan-->

         <!--@can('restaurantReviews.index')-->

         <!--       <li class="nav-item">-->

         <!--           <a class="nav-link {{ Request::is('restaurantReviews*') ? 'active' : '' }}" href="{!! route('restaurantReviews.index') !!}">@if($icons)-->

         <!--                   <i class="nav-icon fa fa-comments"></i>@endif<p>{{trans('lang.restaurant_review_plural')}}</p></a>-->

         <!--       </li>-->

         <!--   @endcan -->

        </ul>

    </li>

@endcan



@endif





@can('drivers.index')

    <li class="nav-item">

        <a class="nav-link {{ Request::is('drivers*') ? 'active' : '' }}" href="{!! route('drivers.index') !!}">@if($icons)<i class="nav-icon fa fa-car"></i>@endif<p>{{trans('Riders')}} </p></a>

    </li>

@endcan



@if($role_id == "3")

  <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/users_details')}}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Users')}}</p>

		 </a>

  </li>

  @endif





  @if($role_id == "4")

  <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/customers') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Customers')}}</p>

		 </a>

  </li>

  @endif

  @if($role_id == "2")

  <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/appCustomers') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Customers')}}</p>

		 </a>

  </li>

  @endif

@can('cuisines.index')

    <li class="nav-item">

        <a class="nav-link {{ Request::is('cuisines*') ? 'active' : '' }}" href="{!! route('cuisines.index') !!}">@if($icons)

        <i class="nav-icon fa fa-globe"></i>@endif<p>{{trans('lang.cuisine_plural')}}</p></a>

    </li>

@endcan









  <!--@can('orders.index')-->

                              <!--<li class="nav-item">-->

                              <!--  <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! url('get_promotions') !!}">@if($icons)-->

                              <!--          <i class="nav-icon fa fa-folder"></i>@endif<p>{{trans('promotions')}}</p></a>-->

                              <!--</li>-->

                          <!--@endcan-->



<!--@can('categories.index')-->





                <!--<ul class="nav nav-treeview">-->



                <!--  @can('categories.index')-->

                  





                  

                  @if($role_id == "4")

                      <li class="nav-item">



                        <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! route('categories.index') !!}">@if($icons)

                                <i class="nav-icon fa fa-folder"></i>@endif<p>{{trans('lang.category_plural')}} </p></a>



                      </li>

                      

                      @endif

                  <!--@endcan-->







<!--                          @can('orders.index')-->

<!--                              <li class="nav-item">-->

<!--                                <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! url('add_promotion') !!}">@if($icons)-->

<!--                                        <i class="nav-icon fa fa-folder"></i>@endif<p>{{trans('lang.promotion_plural')}}</p></a>-->

<!--                              </li>-->

<!--                          @endcan-->



<!--                          @can('orders.index')-->

<!--                              <li class="nav-item">-->

<!--                                <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="{!! url('get_promotions') !!}">@if($icons)-->

<!--                                        <i class="nav-icon fa fa-folder"></i>@endif<p>{{trans('promotions')}}</p></a>-->

<!--                              </li>-->

<!--                          @endcan-->



<!--                </ul>-->

<!--    </li>-->

<!--@endcan-->



@can('orders.index')

    <li class="nav-item has-treeview {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-shopping-basket"></i>@endif

            <p>{{trans('lang.order_plural')}} <i class="right fa fa-angle-left"></i>

            </p>

            <span class="blink_text">

                 @if($role_id == "2")

                   @php

                   echo $admin_counter;

                   @endphp

                @endif

                @if($role_id == "3")

                   @php

                   echo $manager_counter;

                   @endphp

                @endif

                 @if($role_id == "4")

                   @php

                   echo $restaurant_counter;

                   @endphp

                @endif

                + <span class="blink_notification"></span></span>

        </a>

        <ul class="nav nav-treeview">





            @can('orders.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('orders*') ? 'active' : '' }}" href="{!! route('orders.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-shopping-basket"></i>@endif<p>{{trans('lang.order_plural')}}</p><span class="blink_text"> 

                @if($role_id == "2")

                   @php

                   echo $admin_counter;

                   @endphp

                @endif

                @if($role_id == "3")

                   @php

                   echo $manager_counter;

                   @endphp

                @endif

                 @if($role_id == "4")

                   @php

                   echo $restaurant_counter;

                   @endphp

                @endif

                  

                  + <span class="blink_notification"></span></span></a>

                </li>

            @endcan

            @if($role_id == "3")

            <li class="nav-item">

                    <a class="nav-link {{ Request::is('completed*') ? 'active' : '' }}" href="{{ url('orders/completed') }}">@if($icons)

                            <i class="nav-icon fa fa-server"></i>@endif<p>Orders Completed</p></a>

            </li>

            <li class="nav-item">

                    <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ url('orders/live_orders') }}">@if($icons)

                            <i class="nav-icon fa fa-server"></i>@endif<p>Live Orders</p></a>

            </li>

             <li class="nav-item">

                    <a class="nav-link {{ Request::is('') ? 'active' : '' }}" href="{{ url('orders/progress_orders') }}">@if($icons)

                            <i class="nav-icon fa fa-server"></i>@endif<p>Orders in Progress</p></a>

            </li>

            @endif

            @can('orderStatuses.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('orderStatuses*') ? 'active' : '' }}" href="{!! route('orderStatuses.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-server"></i>@endif<p>{{trans('lang.order_status_plural')}}</p></a>

                </li>

            @endcan





            @if($user_id == 1)



    <!--        <li class="nav-item">-->

				<!--<a class="nav-link {{ Request::is('chart*') ? 'active' : '' }}" href="javascript:void(0)">-->

				<!--	<i class="nav-icon fa fa-file-text-o"></i><p>{{trans('Orders Report')}}</p>-->

				<!--</a>-->

				<!--<ul class="nav nav-treeview">-->

				<!--    <li class="nav-item">-->

				<!--	   <a class="nav-link" href="{{ url('/orders/paid')}}">-->

				<!--	      <i class="nav-icon fa fa-bar-chart"></i><p>{{trans('Paid Orders')}}</p>-->

				<!--	   </a>-->

				<!--	</li>-->

				<!--	<li class="nav-item">-->

				<!--	  <a class="nav-link" href="{{ url('/orders/undelivered')}}">-->

				<!--	    <i class="nav-icon fa fa-bar-chart"></i><p>{{trans('Undelivered Orders')}}</p>-->

				<!--	  </a>-->

				<!--	</li>-->

				<!--	<li class="nav-item">-->

				<!--	  <a class="nav-link" href="{{ url('/orders/completed')}}">-->

				<!--	  <i class="nav-icon fa fa-bar-chart"></i><p>{{trans('Completed Orders')}}</p>-->

				<!--	  </a>-->

				<!--	</li>-->

				<!--</ul>-->

    <!--        </li>-->



            @endif



            <!--@can('deliveryAddresses.index')-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link {{ Request::is('deliveryAddresses*') ? 'active' : '' }}" href="{!! route('deliveryAddresses.index') !!}">@if($icons)-->

            <!--                <i class="nav-icon fa fa-map"></i>@endif<p>{{trans('lang.delivery_address_plural')}}</p></a>-->

            <!--    </li>-->

            <!--@endcan-->





        </ul>

    </li>

@endcan





@can('foods.index')

    <li class="nav-item has-treeview {{ Request::is('foods*') || Request::is('extra*') || Request::is('extraGroups*') || Request::is('nutrition*') ? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('foods*') || Request::is('extra*') || Request::is('extraGroups*') || Request::is('nutrition*') ? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-fire"></i>@endif

            <p>{{trans('Food Menus')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            @can('foods.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('foods*') ? 'active' : '' }}" href="{!! route('foods.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-fire"></i>@endif

                        <p>{{trans('lang.food_plural')}}</p></a>

                </li>

            @endcan

            @can('extraGroups.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('extraGroups*') ? 'active' : '' }}" href="{!! route('extraGroups.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-plus-square"></i>@endif<p>{{trans('lang.extra_group_plural')}}</p></a>

                </li>

            @endcan

            @can('extras.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('extras*') ? 'active' : '' }}" href="{!! route('extras.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-plus-circle"></i>@endif<p>{{trans('lang.extra_plural')}}</p></a>

                </li>

            @endcan





            @can('nutrition.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('nutrition*') ? 'active' : '' }}" href="{!! route('nutrition.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-tasks"></i>@endif<p>{{trans('lang.nutrition_plural')}}</p></a>

                </li>

            @endcan



        </ul>

    </li>

@endcan



 @can('foodReviews.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('foodReviews*') ? 'active' : '' }}" href="{!! route('foodReviews.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-comments"></i>@endif<p>{{trans('Reviews')}}</p></a>

                </li>

@endcan



{{-- @if($role_id == "3") --}}
<!-- Changed By Iheb
 <li class="nav-item">

                    <a class="nav-link {{-- {{ Request::is('foodReviews*') ? 'active' : '' }} --}}" href="{{-- {!! url('/managerReview') !!} --}}">{{-- @if($icons) --}}

                            <i class="nav-icon fa fa-comments"></i>{{-- @endif --}}<p>{{-- {{trans('All Reviews')}} --}}</p></a>

                </li>-->

  {{-- @endif --}}

  @if($role_id == "4")

 <li class="nav-item">

                    <a class="nav-link {{ Request::is('foodReviews*') ? 'active' : '' }}" href="{!! url('/foodRestaurantReview') !!}">@if($icons)

                            <i class="nav-icon fa fa-comments"></i>@endif<p>{{trans('Food Reviews')}}</p></a>

                </li>

  @endif

  @if($user_id == 1)

@can('coupons.index')

    <li class="nav-item">

        <a class="nav-link {{ Request::is('coupons*') ? 'active' : '' }}" href="{!! route('coupons.index') !!}">@if($icons)<i class="nav-icon fa fa-ticket"></i>@endif<p>{{trans('lang.coupon_plural')}}</p></a>

    </li>

@endcan

 @endif

@if($role_id == "3")

   <li class="nav-item">

        <a class="nav-link {{ Request::is('coupons*') ? 'active' : '' }}" href="{!! url('/managerCoupons') !!}">@if($icons)<i class="nav-icon fa fa-ticket"></i>@endif<p>{{trans('lang.coupon_plural')}}</p></a>

    </li>

  @endif





<!--@can('faqs.index')-->

<!--    <li class="nav-item ">-->

<!--        <a href="{!! route('faqs.index') !!}" class="nav-link {{ Request::is('faqs*')  ? 'active' : '' }}"> @if($icons)-->

<!--                <i class="nav-icon fa fa-support"></i>@endif-->

<!--            <p>{{trans('lang.faq_plural')}} </p>-->

<!--        </a>-->

<!--    </li>-->

<!--    @endcan-->

<!--    @can('about.index')-->

<!--        <li class="nav-item ">-->

<!--        <a href="{!! route('about.index') !!}" class="nav-link {{ Request::is('faqs*')  ? 'active' : '' }}"> @if($icons)-->

<!--                <i class="nav-icon fa fa-support"></i>@endif-->

<!--            <p>About Us </p>-->

<!--        </a>-->

<!--    </li>-->

<!--        @endcan-->

<!--            @can('faqs.index')-->

<!--           <li class="nav-item ">-->

<!--        <a href="{!! route('faqs.index') !!}" class="nav-link {{ Request::is('faqs*')  ? 'active' : '' }}"> @if($icons)-->

<!--                <i class="nav-icon fa fa-support"></i>@endif-->

<!--            <p>Terms of Services </p>-->

<!--        </a>-->

<!--    </li>-->

<!--        @endcan-->

<!--             @can('faqs.index')-->

<!--           <li class="nav-item ">-->

<!--        <a href="{!! route('faqs.index') !!}" class="nav-link {{ Request::is('faqs*')  ? 'active' : '' }}"> @if($icons)-->

<!--                <i class="nav-icon fa fa-support"></i>@endif-->

<!--            <p>Privacy Policy </p>-->

<!--        </a>-->

<!--    </li>-->

<!--@endcan-->









         @can('faqs.index')

           <li class="nav-item ">

        <a href="{{ url('/enquiry')}}" class="nav-link {{ Request::is('faqs*')  ? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-support"></i>@endif

            <p>Enquiries</p>

            <span class="blink_text">

     @if($role_id == "2")

                   @php

                   echo $adminSupport_counter;

                   @endphp

                @endif

                + <span class="blink_notification"></span></span>

        </a>

    </li>

@endcan





  @if($role_id == "2")



  

      <li class="nav-item has-treeview {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-envelope-open"></i>@endif

            <p>{{trans('Push, FAQ & About')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

                                                     <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/pushNotifications') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Push Notifications')}}</p>

		 </a>

  </li>

                             <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{!! route('faqs.index') !!}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('FAQ')}}</p>

		 </a>

  </li>

     <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/about/edit/1') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('About us')}}</p>

		 </a>

  </li>



       <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/terms/edit/1') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Terms Of Services')}}</p>

		 </a>

  </li>

         <li class="nav-item">

        <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/privacy') }}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Privacy Policy')}}</p>

		 </a>

  </li>

        </ul>

    </li>

  @endif

  <!--  <li class="nav-item">-->

  <!--      <a class="nav-link" href="{{ url('/analytics')}}">-->

  <!--          <i class="nav-icon fa fa-line-chart"></i><p>{{trans('Analytics')}}</p>-->

		<!--</a>-->

  <!--  </li>-->



<!--<li class="nav-header">{{trans('lang.app_setting')}}</li>

@can('medias')

    <li class="nav-item">

        <a class="nav-link {{ Request::is('medias*') ? 'active' : '' }}" href="{!! url('medias') !!}">@if($icons)<i class="nav-icon fa fa-picture-o"></i>@endif

            <p>{{trans('lang.media_plural')}}</p></a>

    </li>

@endcan -->



@can('payments.index')

    <li class="nav-item has-treeview {{ Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('restaurantsPayouts*') || Request::is('payments*') ? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('restaurantsPayouts*') || Request::is('payments*') ? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-credit-card"></i>@endif

            <p>{{trans('lang.payment_plural')}}<i class="right fa fa-angle-left"></i></p>

        </a>

        <ul class="nav nav-treeview">





            @can('payments.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('payments*') ? 'active' : '' }}" href="{!! route('payments.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-money"></i>@endif<p>{{trans('lang.payment_plural')}}</p></a>

                </li>

            @endcan



            @can('earnings.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('earnings*') ? 'active' : '' }}" href="{!! route('earnings.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-money"></i>@endif<p>{{trans('lang.earning_plural')}} <span class="right badge badge-danger">New</span></p>

                    </a>

                </li>

				<!--<li class="nav-item">-->

				<!--			<a class="nav-link {{ Request::is('earnings/earning_report*') ? 'active' : '' }}" href="{{ url('/earnings/earning_report')}}">-->

				<!--				<i class="nav-icon fa fa-file-text-o"></i><p>{{trans('Earnings Report')}}</p>-->

				<!--			</a>-->

    <!--            </li>-->

            @endcan



            @can('driversPayouts.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('driversPayouts*') ? 'active' : '' }}" href="{!! route('driversPayouts.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-dollar"></i>@endif<p>{{trans('lang.drivers_payout_plural')}}</p></a>

                </li>

            @endcan



            @can('restaurantsPayouts.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('restaurantsPayouts*') ? 'active' : '' }}" href="{!! route('restaurantsPayouts.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-dollar"></i>@endif<p>{{trans('lang.restaurants_payout_plural')}}</p></a>

                </li>

            @endcan

        </ul>

    </li>

@endcan





<!--@if($user_id != 1)-->

<!--    <li class="nav-item has-treeview {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">-->

<!--        <a href="#" class="nav-link {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)-->

<!--                <i class="nav-icon fa fa-envelope-open"></i>@endif-->

<!--            <p>{{trans('Support')}} <i class="right fa fa-angle-left"></i>-->

<!--            </p>-->

<!--        </a>-->

<!--        <ul class="nav nav-treeview">-->

<!--            <li class="nav-item">-->

<!--            <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/contact')}}">-->

<!--            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Create Support')}}</p>-->

<!--		</a>-->

<!--            </li>-->

<!--                <li class="nav-item">-->

<!--                    <a class="nav-link {{ Request::is('orderStatuses*') ? 'active' : '' }}" href="{{ url('/contactView')}}">@if($icons)-->

<!--                      <i class="nav-icon fa fa-server"></i>@endif<p>{{trans('My Supports')}}</p></a>-->

<!--                </li>-->

<!--        </ul>-->

<!--    </li>-->

<!--  @endif-->

@if($role_id == '4')

    <li class="nav-item has-treeview {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-envelope-open"></i>@endif

            <p>{{trans('Support')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

            <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/contact')}}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Create Support')}}</p>

		</a>

            </li>

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('orderStatuses*') ? 'active' : '' }}" href="{{ url('/contactView')}}">@if($icons)

                      <i class="nav-icon fa fa-server"></i>@endif<p>{{trans('My Supports')}}</p></a>

                </li>

        </ul>

    </li>

  @endif

@if($role_id == '3')

    <li class="nav-item has-treeview {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : '' }}"> @if($icons)

                <i class="nav-icon fa fa-envelope-open"></i>@endif

            <p>{{trans('Support')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

            <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('/contact')}}">

            <i class="nav-icon fa fa-envelope-open"></i><p>{{trans('Create Support')}}</p>

		</a>

            </li>

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('orderStatuses*') ? 'active' : '' }}" href="{{ url('/contactViewManager')}}">@if($icons)

                      <i class="nav-icon fa fa-server"></i>@endif<p>{{trans('My Supports')}}</p></a>

                </li>

        </ul>

    </li>

  @endif





@can('app-settings')

    <li class="nav-item has-treeview {{ Request::is('settings/mobile*') || Request::is('slides*') ? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{ Request::is('settings/mobile*') || Request::is('slides*') ? 'active' : '' }}">

            @if($icons)<i class="nav-icon fa fa-mobile"></i>@endif

            <p>

                {{trans('App Settings')}}

                <i class="right fa fa-angle-left"></i>

            </p></a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

                <a href="{!! url('settings/mobile/globals') !!}" class="nav-link {{  Request::is('settings/mobile/globals*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-cog"></i> @endif <p>{{trans('lang.app_setting_globals')}}

                        <span class="right badge badge-danger">New</span></p>

                </a>

            </li>



            <li class="nav-item">

                <a href="{!! url('settings/mobile/colors') !!}" class="nav-link {{  Request::is('settings/mobile/colors*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-pencil"></i> @endif <p>{{trans('lang.app_colors')}} <span class="right badge badge-danger">New</span>

                    </p>

                </a>

            </li>

              <li class="nav-item">

                <a href="{!! url('settings/mobile/content') !!}" class="nav-link {{  Request::is('settings/mobile/content*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-pencil"></i> @endif <p>{{trans('lang.app_contents')}} <span class="right badge badge-danger">New</span>

                    </p>

                </a>

            </li>

            <!--<li class="nav-item">-->

            <!--    <a href="{!! url('settings/mobile/home') !!}" class="nav-link {{  Request::is('settings/mobile/home*') ? 'active' : '' }}">-->

            <!--        @if($icons)<i class="nav-icon fa fa-home"></i> @endif <p>{{trans('lang.mobile_home')}}-->

            <!--            <span class="right badge badge-danger">New</span></p>-->

            <!--    </a>-->

            <!--</li>-->



            <!--@can('slides.index')-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link {{ Request::is('slides*') ? 'active' : '' }}" href="{!! route('slides.index') !!}">@if($icons)<i class="nav-icon fa fa-magic"></i>@endif<p>{{trans('lang.slide_plural')}} <span class="right badge badge-danger">New</span></p></a>-->

            <!--    </li>-->

            <!--@endcan-->

        </ul>



    </li>

    <li class="nav-item has-treeview {{

    (Request::is('settings*') ||

     Request::is('users*')) && !Request::is('settings/mobile*')

        ? 'menu-open' : '' }}">

        <a href="#" class="nav-link {{

        (Request::is('settings*') ||

         Request::is('users*')) && !Request::is('settings/mobile*')

          ? 'active' : '' }}"> @if($icons)<i class="nav-icon fa fa-cogs"></i>@endif

            <p>{{trans('lang.app_setting')}} <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

                <a href="{!! url('settings/app/globals') !!}" class="nav-link {{  Request::is('settings/app/globals*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-cog"></i> @endif <p>{{trans('lang.app_setting_globals')}}</p>

                </a>

            </li>



            @can('users.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{!! route('users.index') !!}">@if($icons)

                            <i class="nav-icon fa fa-users"></i>@endif

                        <p>{{trans('lang.user_plural')}}</p></a>

                </li>

            @endcan

            @can('permissions.index')

                <li class="nav-item has-treeview {{ Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link {{ Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'active' : '' }}">

                        @if($icons)<i class="nav-icon fa fa-user-secret"></i>@endif

                        <p>

                            {{trans('lang.permission_menu')}}

                            <i class="right fa fa-angle-left"></i>

                        </p></a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a class="nav-link {{ Request::is('settings/permissions') ? 'active' : '' }}" href="{!! route('permissions.index') !!}">

                                @if($icons)<i class="nav-icon fa fa-circle-o"></i>@endif

                                <p>{{trans('lang.permission_table')}}</p>

                            </a>

                        </li>

                        @can('permissions.create')

                            <li class="nav-item">

                                <a class="nav-link {{ Request::is('settings/permissions/create') ? 'active' : '' }}" href="{!! route('permissions.create') !!}">

                                    @if($icons)<i class="nav-icon fa fa-circle-o"></i>@endif

                                    <p>{{trans('lang.permission_create')}}</p>

                                </a>

                            </li>

                        @endcan

                        @can('roles.index')

                            <li class="nav-item">

                                <a class="nav-link {{ Request::is('settings/roles') ? 'active' : '' }}" href="{!! route('roles.index') !!}">

                                    @if($icons)<i class="nav-icon fa fa-circle-o"></i>@endif

                                    <p>{{trans('lang.role_table')}}</p>

                                </a>

                            </li>

                        @endcan

                        @can('roles.create')

                            <li class="nav-item">

                                <a class="nav-link {{ Request::is('settings/roles/create') ? 'active' : '' }}" href="{!! route('roles.create') !!}">

                                    @if($icons)<i class="nav-icon fa fa-circle-o"></i>@endif

                                    <p>{{trans('lang.role_create')}}</p>

                                </a>

                            </li>

                        @endcan

                    </ul>



                </li>

            @endcan



            <!--<li class="nav-item">-->

            <!--    <a class="nav-link {{ Request::is('settings/customFields*') ? 'active' : '' }}" href="{!! route('customFields.index') !!}">@if($icons)-->

            <!--            <i class="nav-icon fa fa-list"></i>@endif<p>{{trans('lang.custom_field_plural')}}</p></a>-->

            <!--</li>-->



            <li class="nav-item">

                <a href="{!! url('settings/app/localisation') !!}" class="nav-link {{  Request::is('settings/app/localisation*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-language"></i> @endif <p>{{trans('lang.app_setting_localisation')}}</p></a>

            </li>

            <li class="nav-item">

                <a href="{!! url('settings/translation/en') !!}" class="nav-link {{ Request::is('settings/translation*') ? 'active' : '' }}">

                    @if($icons) <i class="nav-icon fa fa-language"></i> @endif <p>{{trans('lang.app_setting_translation')}}</p></a>

            </li>

            @can('currencies.index')

                <li class="nav-item">

                    <a class="nav-link {{ Request::is('settings/currencies*') ? 'active' : '' }}" href="{!! route('currencies.index') !!}">@if($icons)

                           <span class="nav-icon ml-3">₦</span>@endif<p class="ml-3">{{trans('lang.currency_plural')}}</p></a>

                </li>

            @endcan



            <li class="nav-item">

                <a href="{!! url('settings/payment/payment') !!}" class="nav-link {{  Request::is('settings/payment*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-credit-card"></i> @endif <p>{{trans('lang.app_setting_payment')}}</p>

                </a>

            </li>



            <!--<li class="nav-item">-->

            <!--    <a href="{!! url('settings/app/social') !!}" class="nav-link {{  Request::is('settings/app/social*') ? 'active' : '' }}">-->

            <!--        @if($icons)<i class="nav-icon fa fa-globe"></i> @endif <p>{{trans('lang.app_setting_social')}}</p>-->

            <!--    </a>-->

            <!--</li>-->



            <!--<li class="nav-item">-->

            <!--    <a href="{!! url('settings/app/notifications') !!}" class="nav-link {{  Request::is('settings/app/notifications*') ? 'active' : '' }}">-->

            <!--        @if($icons)<i class="nav-icon fa fa-bell"></i> @endif <p>{{trans('lang.firebase_app_setting_notifications')}}</p>-->

            <!--    </a>-->

            <!--</li>-->



            <li class="nav-item">

                <a href="{!! url('settings/mail/smtp') !!}" class="nav-link {{ Request::is('settings/mail*') ? 'active' : '' }}">

                    @if($icons)<i class="nav-icon fa fa-envelope"></i> @endif <p>{{trans('lang.app_setting_mail')}}</p>

                </a>

            </li>



        </ul>

    </li>

@endcan

