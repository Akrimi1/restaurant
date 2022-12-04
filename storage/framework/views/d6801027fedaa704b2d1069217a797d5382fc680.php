



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





<?php if($user_id == 1): ?>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard')): ?>

    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>" href="<?php echo url('dashboard'); ?>"><?php if($icons): ?>

                <i class="nav-icon fa fa-dashboard"></i><?php endif; ?>

            <p><?php echo e(trans('lang.dashboard')); ?></p></a>

    </li>

<?php endif; ?>







<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('favorites.index')): ?>-->

<!--    <li class="nav-item">-->

<!--        <a class="nav-link <?php echo e(Request::is('favorites*') ? 'active' : ''); ?>" href="<?php echo route('favorites.index'); ?>"><?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-heart"></i><?php endif; ?><p><?php echo e(trans('lang.favorite_plural')); ?></p></a>-->

<!--    </li>-->

<!--<?php endif; ?>-->







  <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/manager_details')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Managers')); ?></p>

		 </a>

  </li>



<!--<li class="nav-header"><?php echo e(trans('Restaurant Management')); ?></li>-->



<?php endif; ?>

<?php if($role_id == "3"): ?>

  <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/managerDashboard')); ?>">

            <i class="nav-icon fa fa-dashboard"></i><p><?php echo e(trans('Manager Dashboard')); ?></p>

		 </a>

  </li>

<?php endif; ?>

   <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/liveOrderTrack')); ?>">

            <i class="nav-icon fa fa-map-marker"></i><p><?php echo e(trans('Live Tracking')); ?></p>

		 </a>

  </li>

<?php if($role_id == "1" || $role_id == "2" || $role_id == "3"): ?>



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurants.index')): ?>

    <li class="nav-item has-treeview <?php echo e((Request::is('restaurants*') || Request::is('requestedRestaurants*') || Request::is('galleries*') || Request::is('restaurantReviews*')) && !Request::is('restaurantsPayouts*') ? 'menu-open' : ''); ?>">

        <a href="<?php echo route('restaurants.index'); ?>" class="nav-link <?php echo e((Request::is('restaurants*') || Request::is('requestedRestaurants*') || Request::is('galleries*') || Request::is('restaurantReviews*')) && !Request::is('restaurantsPayouts*')? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-cutlery"></i><?php endif; ?>

            <p><?php echo e(trans('Vendors')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>





        <ul class="nav nav-treeview">







             <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurants.index')): ?>-->

              <?php if($user_id == 1): ?>

              

              

    <!--           <li class="<?php echo e(Request::is('about') ? 'active' : ''); ?>">-->

    <!--    <a href="<?php echo e(url('about')); ?>">About Us</a>-->

    <!--</li>-->

              

                <li class="nav-item">





                    <a class="nav-link <?php echo e(Request::is('restaurants/add_vendors_details') ? 'active' : ''); ?>" href="<?php echo url('restaurants/add_vendors_details'); ?>"><?php if($icons): ?>



                            <i class="nav-icon fa fa-cutlery"></i><?php endif; ?><p><?php echo e(trans('Add Category')); ?></p></a>

                </li>





                <li class="nav-item">





                    <a class="nav-link <?php echo e(Request::is('show_vendors') ? 'active' : ''); ?>" href="<?php echo url('show_vendors'); ?>"><?php if($icons): ?>



                            <i class="nav-icon fa fa-cutlery"></i><?php endif; ?><p><?php echo e(trans('Show Categories')); ?></p></a>

                </li>

<?php endif; ?>

          

            <!--<?php endif; ?>-->



            <!--<li class="nav-item">-->

            <!--        <a class="nav-link <?php echo e(Request::is('restaurants*') ? 'active' : ''); ?>" href="<?php echo url('restaurants/vendors'); ?>"><?php if($icons): ?>-->

            <!--                <i class="nav-icon fa fa-cutlery"></i><?php endif; ?><p><?php echo e(trans('vendor add')); ?></p></a>-->

            <!--    </li>-->

            

              <?php if($user_id == 1): ?>



    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('categories*') ? 'active' : ''); ?>" href="<?php echo route('categories.index'); ?>"><?php if($icons): ?>

                <i class="nav-icon fa fa-folder"></i><?php endif; ?><p><?php echo e(trans('Vendor Category')); ?></p></a>

                </li>

                <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurants.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('restaurants') ? 'active' : ''); ?>" href="<?php echo route('restaurants.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-cutlery"></i><?php endif; ?><p><?php echo e(trans('Show Vendors')); ?></p></a>

                </li>

            <?php endif; ?>

            <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('galleries.index')): ?>-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link <?php echo e(Request::is('galleries*') ? 'active' : ''); ?>" href="<?php echo route('galleries.index'); ?>"><?php if($icons): ?>-->

            <!--                <i class="nav-icon fa fa-image"></i><?php endif; ?><p><?php echo e(trans('lang.gallery_plural')); ?></p></a>-->

            <!--    </li>-->

            <!--<?php endif; ?>-->

         <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurantReviews.index')): ?>-->

         <!--       <li class="nav-item">-->

         <!--           <a class="nav-link <?php echo e(Request::is('restaurantReviews*') ? 'active' : ''); ?>" href="<?php echo route('restaurantReviews.index'); ?>"><?php if($icons): ?>-->

         <!--                   <i class="nav-icon fa fa-comments"></i><?php endif; ?><p><?php echo e(trans('lang.restaurant_review_plural')); ?></p></a>-->

         <!--       </li>-->

         <!--   <?php endif; ?> -->

        </ul>

    </li>

<?php endif; ?>



<?php endif; ?>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('drivers.index')): ?>

    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('drivers*') ? 'active' : ''); ?>" href="<?php echo route('drivers.index'); ?>"><?php if($icons): ?><i class="nav-icon fa fa-car"></i><?php endif; ?><p><?php echo e(trans('Riders')); ?> </p></a>

    </li>

<?php endif; ?>



<?php if($role_id == "3"): ?>

  <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/users_details')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Users')); ?></p>

		 </a>

  </li>

  <?php endif; ?>





  <?php if($role_id == "4"): ?>

  <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/customers')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Customers')); ?></p>

		 </a>

  </li>

  <?php endif; ?>

  <?php if($role_id == "2"): ?>

  <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/appCustomers')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Customers')); ?></p>

		 </a>

  </li>

  <?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cuisines.index')): ?>

    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('cuisines*') ? 'active' : ''); ?>" href="<?php echo route('cuisines.index'); ?>"><?php if($icons): ?>

        <i class="nav-icon fa fa-globe"></i><?php endif; ?><p><?php echo e(trans('lang.cuisine_plural')); ?></p></a>

    </li>

<?php endif; ?>









  <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.index')): ?>-->

                              <!--<li class="nav-item">-->

                              <!--  <a class="nav-link <?php echo e(Request::is('categories*') ? 'active' : ''); ?>" href="<?php echo url('get_promotions'); ?>"><?php if($icons): ?>-->

                              <!--          <i class="nav-icon fa fa-folder"></i><?php endif; ?><p><?php echo e(trans('promotions')); ?></p></a>-->

                              <!--</li>-->

                          <!--<?php endif; ?>-->



<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.index')): ?>-->





                <!--<ul class="nav nav-treeview">-->



                <!--  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('categories.index')): ?>-->

                  





                  

                  <?php if($role_id == "4"): ?>

                      <li class="nav-item">



                        <a class="nav-link <?php echo e(Request::is('categories*') ? 'active' : ''); ?>" href="<?php echo route('categories.index'); ?>"><?php if($icons): ?>

                                <i class="nav-icon fa fa-folder"></i><?php endif; ?><p><?php echo e(trans('lang.category_plural')); ?> </p></a>



                      </li>

                      

                      <?php endif; ?>

                  <!--<?php endif; ?>-->







<!--                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.index')): ?>-->

<!--                              <li class="nav-item">-->

<!--                                <a class="nav-link <?php echo e(Request::is('categories*') ? 'active' : ''); ?>" href="<?php echo url('add_promotion'); ?>"><?php if($icons): ?>-->

<!--                                        <i class="nav-icon fa fa-folder"></i><?php endif; ?><p><?php echo e(trans('lang.promotion_plural')); ?></p></a>-->

<!--                              </li>-->

<!--                          <?php endif; ?>-->



<!--                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.index')): ?>-->

<!--                              <li class="nav-item">-->

<!--                                <a class="nav-link <?php echo e(Request::is('categories*') ? 'active' : ''); ?>" href="<?php echo url('get_promotions'); ?>"><?php if($icons): ?>-->

<!--                                        <i class="nav-icon fa fa-folder"></i><?php endif; ?><p><?php echo e(trans('promotions')); ?></p></a>-->

<!--                              </li>-->

<!--                          <?php endif; ?>-->



<!--                </ul>-->

<!--    </li>-->

<!--<?php endif; ?>-->



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.index')): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-shopping-basket"></i><?php endif; ?>

            <p><?php echo e(trans('lang.order_plural')); ?> <i class="right fa fa-angle-left"></i>

            </p>

            <span class="blink_text">

                 <?php if($role_id == "2"): ?>

                   <?php

                   echo $admin_counter;

                   ?>

                <?php endif; ?>

                <?php if($role_id == "3"): ?>

                   <?php

                   echo $manager_counter;

                   ?>

                <?php endif; ?>

                 <?php if($role_id == "4"): ?>

                   <?php

                   echo $restaurant_counter;

                   ?>

                <?php endif; ?>

                + <span class="blink_notification"></span></span>

        </a>

        <ul class="nav nav-treeview">





            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orders.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('orders*') ? 'active' : ''); ?>" href="<?php echo route('orders.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-shopping-basket"></i><?php endif; ?><p><?php echo e(trans('lang.order_plural')); ?></p><span class="blink_text"> 

                <?php if($role_id == "2"): ?>

                   <?php

                   echo $admin_counter;

                   ?>

                <?php endif; ?>

                <?php if($role_id == "3"): ?>

                   <?php

                   echo $manager_counter;

                   ?>

                <?php endif; ?>

                 <?php if($role_id == "4"): ?>

                   <?php

                   echo $restaurant_counter;

                   ?>

                <?php endif; ?>

                  

                  + <span class="blink_notification"></span></span></a>

                </li>

            <?php endif; ?>

            <?php if($role_id == "3"): ?>

            <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('completed*') ? 'active' : ''); ?>" href="<?php echo e(url('orders/completed')); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-server"></i><?php endif; ?><p>Orders Completed</p></a>

            </li>

            <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('') ? 'active' : ''); ?>" href="<?php echo e(url('orders/live_orders')); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-server"></i><?php endif; ?><p>Live Orders</p></a>

            </li>

             <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('') ? 'active' : ''); ?>" href="<?php echo e(url('orders/progress_orders')); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-server"></i><?php endif; ?><p>Orders in Progress</p></a>

            </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('orderStatuses.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('orderStatuses*') ? 'active' : ''); ?>" href="<?php echo route('orderStatuses.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-server"></i><?php endif; ?><p><?php echo e(trans('lang.order_status_plural')); ?></p></a>

                </li>

            <?php endif; ?>





            <?php if($user_id == 1): ?>



    <!--        <li class="nav-item">-->

				<!--<a class="nav-link <?php echo e(Request::is('chart*') ? 'active' : ''); ?>" href="javascript:void(0)">-->

				<!--	<i class="nav-icon fa fa-file-text-o"></i><p><?php echo e(trans('Orders Report')); ?></p>-->

				<!--</a>-->

				<!--<ul class="nav nav-treeview">-->

				<!--    <li class="nav-item">-->

				<!--	   <a class="nav-link" href="<?php echo e(url('/orders/paid')); ?>">-->

				<!--	      <i class="nav-icon fa fa-bar-chart"></i><p><?php echo e(trans('Paid Orders')); ?></p>-->

				<!--	   </a>-->

				<!--	</li>-->

				<!--	<li class="nav-item">-->

				<!--	  <a class="nav-link" href="<?php echo e(url('/orders/undelivered')); ?>">-->

				<!--	    <i class="nav-icon fa fa-bar-chart"></i><p><?php echo e(trans('Undelivered Orders')); ?></p>-->

				<!--	  </a>-->

				<!--	</li>-->

				<!--	<li class="nav-item">-->

				<!--	  <a class="nav-link" href="<?php echo e(url('/orders/completed')); ?>">-->

				<!--	  <i class="nav-icon fa fa-bar-chart"></i><p><?php echo e(trans('Completed Orders')); ?></p>-->

				<!--	  </a>-->

				<!--	</li>-->

				<!--</ul>-->

    <!--        </li>-->



            <?php endif; ?>



            <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deliveryAddresses.index')): ?>-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link <?php echo e(Request::is('deliveryAddresses*') ? 'active' : ''); ?>" href="<?php echo route('deliveryAddresses.index'); ?>"><?php if($icons): ?>-->

            <!--                <i class="nav-icon fa fa-map"></i><?php endif; ?><p><?php echo e(trans('lang.delivery_address_plural')); ?></p></a>-->

            <!--    </li>-->

            <!--<?php endif; ?>-->





        </ul>

    </li>

<?php endif; ?>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('foods.index')): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('foods*') || Request::is('extra*') || Request::is('extraGroups*') || Request::is('nutrition*') ? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('foods*') || Request::is('extra*') || Request::is('extraGroups*') || Request::is('nutrition*') ? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-fire"></i><?php endif; ?>

            <p><?php echo e(trans('Food Menus')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('foods.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('foods*') ? 'active' : ''); ?>" href="<?php echo route('foods.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-fire"></i><?php endif; ?>

                        <p><?php echo e(trans('lang.food_plural')); ?></p></a>

                </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('extraGroups.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('extraGroups*') ? 'active' : ''); ?>" href="<?php echo route('extraGroups.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-plus-square"></i><?php endif; ?><p><?php echo e(trans('lang.extra_group_plural')); ?></p></a>

                </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('extras.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('extras*') ? 'active' : ''); ?>" href="<?php echo route('extras.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-plus-circle"></i><?php endif; ?><p><?php echo e(trans('lang.extra_plural')); ?></p></a>

                </li>

            <?php endif; ?>





            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('nutrition.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('nutrition*') ? 'active' : ''); ?>" href="<?php echo route('nutrition.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-tasks"></i><?php endif; ?><p><?php echo e(trans('lang.nutrition_plural')); ?></p></a>

                </li>

            <?php endif; ?>



        </ul>

    </li>

<?php endif; ?>



 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('foodReviews.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('foodReviews*') ? 'active' : ''); ?>" href="<?php echo route('foodReviews.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-comments"></i><?php endif; ?><p><?php echo e(trans('Reviews')); ?></p></a>

                </li>

<?php endif; ?>




<!-- Changed By Iheb
 <li class="nav-item">

                    <a class="nav-link " href="">

                            <i class="nav-icon fa fa-comments"></i><p></p></a>

                </li>-->

  

  <?php if($role_id == "4"): ?>

 <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('foodReviews*') ? 'active' : ''); ?>" href="<?php echo url('/foodRestaurantReview'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-comments"></i><?php endif; ?><p><?php echo e(trans('Food Reviews')); ?></p></a>

                </li>

  <?php endif; ?>

  <?php if($user_id == 1): ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupons.index')): ?>

    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('coupons*') ? 'active' : ''); ?>" href="<?php echo route('coupons.index'); ?>"><?php if($icons): ?><i class="nav-icon fa fa-ticket"></i><?php endif; ?><p><?php echo e(trans('lang.coupon_plural')); ?></p></a>

    </li>

<?php endif; ?>

 <?php endif; ?>

<?php if($role_id == "3"): ?>

   <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('coupons*') ? 'active' : ''); ?>" href="<?php echo url('/managerCoupons'); ?>"><?php if($icons): ?><i class="nav-icon fa fa-ticket"></i><?php endif; ?><p><?php echo e(trans('lang.coupon_plural')); ?></p></a>

    </li>

  <?php endif; ?>





<!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faqs.index')): ?>-->

<!--    <li class="nav-item ">-->

<!--        <a href="<?php echo route('faqs.index'); ?>" class="nav-link <?php echo e(Request::is('faqs*')  ? 'active' : ''); ?>"> <?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-support"></i><?php endif; ?>-->

<!--            <p><?php echo e(trans('lang.faq_plural')); ?> </p>-->

<!--        </a>-->

<!--    </li>-->

<!--    <?php endif; ?>-->

<!--    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('about.index')): ?>-->

<!--        <li class="nav-item ">-->

<!--        <a href="<?php echo route('about.index'); ?>" class="nav-link <?php echo e(Request::is('faqs*')  ? 'active' : ''); ?>"> <?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-support"></i><?php endif; ?>-->

<!--            <p>About Us </p>-->

<!--        </a>-->

<!--    </li>-->

<!--        <?php endif; ?>-->

<!--            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faqs.index')): ?>-->

<!--           <li class="nav-item ">-->

<!--        <a href="<?php echo route('faqs.index'); ?>" class="nav-link <?php echo e(Request::is('faqs*')  ? 'active' : ''); ?>"> <?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-support"></i><?php endif; ?>-->

<!--            <p>Terms of Services </p>-->

<!--        </a>-->

<!--    </li>-->

<!--        <?php endif; ?>-->

<!--             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faqs.index')): ?>-->

<!--           <li class="nav-item ">-->

<!--        <a href="<?php echo route('faqs.index'); ?>" class="nav-link <?php echo e(Request::is('faqs*')  ? 'active' : ''); ?>"> <?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-support"></i><?php endif; ?>-->

<!--            <p>Privacy Policy </p>-->

<!--        </a>-->

<!--    </li>-->

<!--<?php endif; ?>-->









         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faqs.index')): ?>

           <li class="nav-item ">

        <a href="<?php echo e(url('/enquiry')); ?>" class="nav-link <?php echo e(Request::is('faqs*')  ? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-support"></i><?php endif; ?>

            <p>Enquiries</p>

            <span class="blink_text">

     <?php if($role_id == "2"): ?>

                   <?php

                   echo $adminSupport_counter;

                   ?>

                <?php endif; ?>

                + <span class="blink_notification"></span></span>

        </a>

    </li>

<?php endif; ?>





  <?php if($role_id == "2"): ?>



  

      <li class="nav-item has-treeview <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-envelope-open"></i><?php endif; ?>

            <p><?php echo e(trans('Push, FAQ & About')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

                                                     <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/pushNotifications')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Push Notifications')); ?></p>

		 </a>

  </li>

                             <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo route('faqs.index'); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('FAQ')); ?></p>

		 </a>

  </li>

     <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/about/edit/1')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('About us')); ?></p>

		 </a>

  </li>



       <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/terms/edit/1')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Terms Of Services')); ?></p>

		 </a>

  </li>

         <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/privacy')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Privacy Policy')); ?></p>

		 </a>

  </li>

        </ul>

    </li>

  <?php endif; ?>

  <!--  <li class="nav-item">-->

  <!--      <a class="nav-link" href="<?php echo e(url('/analytics')); ?>">-->

  <!--          <i class="nav-icon fa fa-line-chart"></i><p><?php echo e(trans('Analytics')); ?></p>-->

		<!--</a>-->

  <!--  </li>-->



<!--<li class="nav-header"><?php echo e(trans('lang.app_setting')); ?></li>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medias')): ?>

    <li class="nav-item">

        <a class="nav-link <?php echo e(Request::is('medias*') ? 'active' : ''); ?>" href="<?php echo url('medias'); ?>"><?php if($icons): ?><i class="nav-icon fa fa-picture-o"></i><?php endif; ?>

            <p><?php echo e(trans('lang.media_plural')); ?></p></a>

    </li>

<?php endif; ?> -->



<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payments.index')): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('restaurantsPayouts*') || Request::is('payments*') ? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('earnings*') || Request::is('driversPayouts*') || Request::is('restaurantsPayouts*') || Request::is('payments*') ? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-credit-card"></i><?php endif; ?>

            <p><?php echo e(trans('lang.payment_plural')); ?><i class="right fa fa-angle-left"></i></p>

        </a>

        <ul class="nav nav-treeview">





            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payments.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('payments*') ? 'active' : ''); ?>" href="<?php echo route('payments.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-money"></i><?php endif; ?><p><?php echo e(trans('lang.payment_plural')); ?></p></a>

                </li>

            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('earnings.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('earnings*') ? 'active' : ''); ?>" href="<?php echo route('earnings.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-money"></i><?php endif; ?><p><?php echo e(trans('lang.earning_plural')); ?> <span class="right badge badge-danger">New</span></p>

                    </a>

                </li>

				<!--<li class="nav-item">-->

				<!--			<a class="nav-link <?php echo e(Request::is('earnings/earning_report*') ? 'active' : ''); ?>" href="<?php echo e(url('/earnings/earning_report')); ?>">-->

				<!--				<i class="nav-icon fa fa-file-text-o"></i><p><?php echo e(trans('Earnings Report')); ?></p>-->

				<!--			</a>-->

    <!--            </li>-->

            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('driversPayouts.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('driversPayouts*') ? 'active' : ''); ?>" href="<?php echo route('driversPayouts.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-dollar"></i><?php endif; ?><p><?php echo e(trans('lang.drivers_payout_plural')); ?></p></a>

                </li>

            <?php endif; ?>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurantsPayouts.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('restaurantsPayouts*') ? 'active' : ''); ?>" href="<?php echo route('restaurantsPayouts.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-dollar"></i><?php endif; ?><p><?php echo e(trans('lang.restaurants_payout_plural')); ?></p></a>

                </li>

            <?php endif; ?>

        </ul>

    </li>

<?php endif; ?>





<!--<?php if($user_id != 1): ?>-->

<!--    <li class="nav-item has-treeview <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : ''); ?>">-->

<!--        <a href="#" class="nav-link <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : ''); ?>"> <?php if($icons): ?>-->

<!--                <i class="nav-icon fa fa-envelope-open"></i><?php endif; ?>-->

<!--            <p><?php echo e(trans('Support')); ?> <i class="right fa fa-angle-left"></i>-->

<!--            </p>-->

<!--        </a>-->

<!--        <ul class="nav nav-treeview">-->

<!--            <li class="nav-item">-->

<!--            <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/contact')); ?>">-->

<!--            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Create Support')); ?></p>-->

<!--		</a>-->

<!--            </li>-->

<!--                <li class="nav-item">-->

<!--                    <a class="nav-link <?php echo e(Request::is('orderStatuses*') ? 'active' : ''); ?>" href="<?php echo e(url('/contactView')); ?>"><?php if($icons): ?>-->

<!--                      <i class="nav-icon fa fa-server"></i><?php endif; ?><p><?php echo e(trans('My Supports')); ?></p></a>-->

<!--                </li>-->

<!--        </ul>-->

<!--    </li>-->

<!--  <?php endif; ?>-->

<?php if($role_id == '4'): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-envelope-open"></i><?php endif; ?>

            <p><?php echo e(trans('Support')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

            <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/contact')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Create Support')); ?></p>

		</a>

            </li>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('orderStatuses*') ? 'active' : ''); ?>" href="<?php echo e(url('/contactView')); ?>"><?php if($icons): ?>

                      <i class="nav-icon fa fa-server"></i><?php endif; ?><p><?php echo e(trans('My Supports')); ?></p></a>

                </li>

        </ul>

    </li>

  <?php endif; ?>

<?php if($role_id == '3'): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('orders*') || Request::is('orderStatuses*') || Request::is('deliveryAddresses*')? 'active' : ''); ?>"> <?php if($icons): ?>

                <i class="nav-icon fa fa-envelope-open"></i><?php endif; ?>

            <p><?php echo e(trans('Support')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

            <a class="nav-link <?php echo e(Request::is('contact*') ? 'active' : ''); ?>" href="<?php echo e(url('/contact')); ?>">

            <i class="nav-icon fa fa-envelope-open"></i><p><?php echo e(trans('Create Support')); ?></p>

		</a>

            </li>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('orderStatuses*') ? 'active' : ''); ?>" href="<?php echo e(url('/contactViewManager')); ?>"><?php if($icons): ?>

                      <i class="nav-icon fa fa-server"></i><?php endif; ?><p><?php echo e(trans('My Supports')); ?></p></a>

                </li>

        </ul>

    </li>

  <?php endif; ?>





<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings')): ?>

    <li class="nav-item has-treeview <?php echo e(Request::is('settings/mobile*') || Request::is('slides*') ? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e(Request::is('settings/mobile*') || Request::is('slides*') ? 'active' : ''); ?>">

            <?php if($icons): ?><i class="nav-icon fa fa-mobile"></i><?php endif; ?>

            <p>

                <?php echo e(trans('App Settings')); ?>


                <i class="right fa fa-angle-left"></i>

            </p></a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

                <a href="<?php echo url('settings/mobile/globals'); ?>" class="nav-link <?php echo e(Request::is('settings/mobile/globals*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-cog"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_globals')); ?>


                        <span class="right badge badge-danger">New</span></p>

                </a>

            </li>



            <li class="nav-item">

                <a href="<?php echo url('settings/mobile/colors'); ?>" class="nav-link <?php echo e(Request::is('settings/mobile/colors*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-pencil"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_colors')); ?> <span class="right badge badge-danger">New</span>

                    </p>

                </a>

            </li>

              <li class="nav-item">

                <a href="<?php echo url('settings/mobile/content'); ?>" class="nav-link <?php echo e(Request::is('settings/mobile/content*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-pencil"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_contents')); ?> <span class="right badge badge-danger">New</span>

                    </p>

                </a>

            </li>

            <!--<li class="nav-item">-->

            <!--    <a href="<?php echo url('settings/mobile/home'); ?>" class="nav-link <?php echo e(Request::is('settings/mobile/home*') ? 'active' : ''); ?>">-->

            <!--        <?php if($icons): ?><i class="nav-icon fa fa-home"></i> <?php endif; ?> <p><?php echo e(trans('lang.mobile_home')); ?>-->

            <!--            <span class="right badge badge-danger">New</span></p>-->

            <!--    </a>-->

            <!--</li>-->



            <!--<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slides.index')): ?>-->

            <!--    <li class="nav-item">-->

            <!--        <a class="nav-link <?php echo e(Request::is('slides*') ? 'active' : ''); ?>" href="<?php echo route('slides.index'); ?>"><?php if($icons): ?><i class="nav-icon fa fa-magic"></i><?php endif; ?><p><?php echo e(trans('lang.slide_plural')); ?> <span class="right badge badge-danger">New</span></p></a>-->

            <!--    </li>-->

            <!--<?php endif; ?>-->

        </ul>



    </li>

    <li class="nav-item has-treeview <?php echo e((Request::is('settings*') ||

     Request::is('users*')) && !Request::is('settings/mobile*')

        ? 'menu-open' : ''); ?>">

        <a href="#" class="nav-link <?php echo e((Request::is('settings*') ||

         Request::is('users*')) && !Request::is('settings/mobile*')

          ? 'active' : ''); ?>"> <?php if($icons): ?><i class="nav-icon fa fa-cogs"></i><?php endif; ?>

            <p><?php echo e(trans('lang.app_setting')); ?> <i class="right fa fa-angle-left"></i>

            </p>

        </a>

        <ul class="nav nav-treeview">

            <li class="nav-item">

                <a href="<?php echo url('settings/app/globals'); ?>" class="nav-link <?php echo e(Request::is('settings/app/globals*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-cog"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_globals')); ?></p>

                </a>

            </li>



            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('users*') ? 'active' : ''); ?>" href="<?php echo route('users.index'); ?>"><?php if($icons): ?>

                            <i class="nav-icon fa fa-users"></i><?php endif; ?>

                        <p><?php echo e(trans('lang.user_plural')); ?></p></a>

                </li>

            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions.index')): ?>

                <li class="nav-item has-treeview <?php echo e(Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'menu-open' : ''); ?>">

                    <a href="#" class="nav-link <?php echo e(Request::is('settings/permissions*') || Request::is('settings/roles*') ? 'active' : ''); ?>">

                        <?php if($icons): ?><i class="nav-icon fa fa-user-secret"></i><?php endif; ?>

                        <p>

                            <?php echo e(trans('lang.permission_menu')); ?>


                            <i class="right fa fa-angle-left"></i>

                        </p></a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a class="nav-link <?php echo e(Request::is('settings/permissions') ? 'active' : ''); ?>" href="<?php echo route('permissions.index'); ?>">

                                <?php if($icons): ?><i class="nav-icon fa fa-circle-o"></i><?php endif; ?>

                                <p><?php echo e(trans('lang.permission_table')); ?></p>

                            </a>

                        </li>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions.create')): ?>

                            <li class="nav-item">

                                <a class="nav-link <?php echo e(Request::is('settings/permissions/create') ? 'active' : ''); ?>" href="<?php echo route('permissions.create'); ?>">

                                    <?php if($icons): ?><i class="nav-icon fa fa-circle-o"></i><?php endif; ?>

                                    <p><?php echo e(trans('lang.permission_create')); ?></p>

                                </a>

                            </li>

                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.index')): ?>

                            <li class="nav-item">

                                <a class="nav-link <?php echo e(Request::is('settings/roles') ? 'active' : ''); ?>" href="<?php echo route('roles.index'); ?>">

                                    <?php if($icons): ?><i class="nav-icon fa fa-circle-o"></i><?php endif; ?>

                                    <p><?php echo e(trans('lang.role_table')); ?></p>

                                </a>

                            </li>

                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.create')): ?>

                            <li class="nav-item">

                                <a class="nav-link <?php echo e(Request::is('settings/roles/create') ? 'active' : ''); ?>" href="<?php echo route('roles.create'); ?>">

                                    <?php if($icons): ?><i class="nav-icon fa fa-circle-o"></i><?php endif; ?>

                                    <p><?php echo e(trans('lang.role_create')); ?></p>

                                </a>

                            </li>

                        <?php endif; ?>

                    </ul>



                </li>

            <?php endif; ?>



            <!--<li class="nav-item">-->

            <!--    <a class="nav-link <?php echo e(Request::is('settings/customFields*') ? 'active' : ''); ?>" href="<?php echo route('customFields.index'); ?>"><?php if($icons): ?>-->

            <!--            <i class="nav-icon fa fa-list"></i><?php endif; ?><p><?php echo e(trans('lang.custom_field_plural')); ?></p></a>-->

            <!--</li>-->



            <li class="nav-item">

                <a href="<?php echo url('settings/app/localisation'); ?>" class="nav-link <?php echo e(Request::is('settings/app/localisation*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-language"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_localisation')); ?></p></a>

            </li>

            <li class="nav-item">

                <a href="<?php echo url('settings/translation/en'); ?>" class="nav-link <?php echo e(Request::is('settings/translation*') ? 'active' : ''); ?>">

                    <?php if($icons): ?> <i class="nav-icon fa fa-language"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_translation')); ?></p></a>

            </li>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currencies.index')): ?>

                <li class="nav-item">

                    <a class="nav-link <?php echo e(Request::is('settings/currencies*') ? 'active' : ''); ?>" href="<?php echo route('currencies.index'); ?>"><?php if($icons): ?>

                           <span class="nav-icon ml-3">₦</span><?php endif; ?><p class="ml-3"><?php echo e(trans('lang.currency_plural')); ?></p></a>

                </li>

            <?php endif; ?>



            <li class="nav-item">

                <a href="<?php echo url('settings/payment/payment'); ?>" class="nav-link <?php echo e(Request::is('settings/payment*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-credit-card"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_payment')); ?></p>

                </a>

            </li>



            <!--<li class="nav-item">-->

            <!--    <a href="<?php echo url('settings/app/social'); ?>" class="nav-link <?php echo e(Request::is('settings/app/social*') ? 'active' : ''); ?>">-->

            <!--        <?php if($icons): ?><i class="nav-icon fa fa-globe"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_social')); ?></p>-->

            <!--    </a>-->

            <!--</li>-->



            <!--<li class="nav-item">-->

            <!--    <a href="<?php echo url('settings/app/notifications'); ?>" class="nav-link <?php echo e(Request::is('settings/app/notifications*') ? 'active' : ''); ?>">-->

            <!--        <?php if($icons): ?><i class="nav-icon fa fa-bell"></i> <?php endif; ?> <p><?php echo e(trans('lang.firebase_app_setting_notifications')); ?></p>-->

            <!--    </a>-->

            <!--</li>-->



            <li class="nav-item">

                <a href="<?php echo url('settings/mail/smtp'); ?>" class="nav-link <?php echo e(Request::is('settings/mail*') ? 'active' : ''); ?>">

                    <?php if($icons): ?><i class="nav-icon fa fa-envelope"></i> <?php endif; ?> <p><?php echo e(trans('lang.app_setting_mail')); ?></p>

                </a>

            </li>



        </ul>

    </li>

<?php endif; ?>

<?php /**PATH C:\wamp64\www\karri\resources\views/layouts/menu.blade.php ENDPATH**/ ?>