<?php $__env->startSection('content'); ?>
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
    <section class="content-header content-header<?php echo e(setting('fixed_header')); ?>">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo e(trans('lang.dashboard')); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?php echo e(trans('lang.dashboard')); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo e(trans('lang.dashboard')); ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
      
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles">
                    <div class="inner">
                         <p><?php echo e(trans('lang.dashboard_total_orders')); ?></p>
                        <h3><?php echo e($ordersCount); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="<?php echo route('orders.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles2">
                    <div class="inner">
                        <p><?php echo e(trans('lang.dashboard_total_earnings')); ?></p>
                        <?php if(setting('currency_right',false) != false): ?>
                            <h3><?php echo e($earning); ?><?php echo e(setting('default_currency')); ?></h3>
                        <?php else: ?>
                            <h3><?php echo e(setting('default_currency')); ?><?php echo e($earning); ?></h3>
                        <?php endif; ?>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="<?php echo route('payments.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?>
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles3">
                    <div class="inner">
                        <p><?php echo e(trans('lang.dashboard_total_clients')); ?></p>
                        <h3><?php echo e($usersCount); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="<?php echo e(url('/users_details')); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles4">
                    <div class="inner">
                        <p>Vendors</p>
                        <h3><?php echo e($restaurantsCount); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cutlery"></i>
                    </div>
                    <a href="<?php echo route('restaurants.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
                    <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles5">
                    <div class="inner">
                        <p>Managers</p>
                       <h3><?php echo e($managerCount); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="<?php echo e(url('/manager_details')); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6" >
                <!-- small box -->
                <div class="small-box dash_box" id="colorsTiles6">
                    <div class="inner">
                        <p>Delivery Boy</p>
                        <h3><?php echo e($driverCount); ?></h3>
                    </div>
                    <div class="icon">
                        <i class="fa fa-group"></i>
                    </div>
                    <a href="<?php echo route('drivers.index'); ?>" class="small-box-footer"><?php echo e(trans('lang.dashboard_more_info')); ?> <i class="fa fa-arrow-circle-right"></i></a>
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
                            <h3 class="card-title"><?php echo e(trans('lang.earning_plural')); ?></h3>
                           <!-- <a href="<?php echo route('payments.index'); ?>"><?php echo e(trans('lang.dashboard_view_all_payments')); ?></a> -->
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
                                <?php if(setting('currency_right',false) != false): ?>
                                    <span class="text-bold text-lg"><?php echo e($earning); ?><?php echo e(setting('default_currency')); ?></span>
                                <?php else: ?>
                                    <span class="text-bold text-lg"><?php echo e(setting('default_currency')); ?><?php echo e($earning); ?></span>
                                <?php endif; ?>
                                <span><?php echo e(trans('lang.dashboard_earning_over_time')); ?></span>
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
                            <div class="col-md-6">
                               <div class="rtab">
                               <ul class="nav nav-tabs " role="tablist">
                            	<!--<li class="nav-item">-->
                            	<!--	<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Daily</a>-->
                            	<!--</li>-->
                            	<li class="nav-item">
                            		<a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">Monthly</a>
                            	</li>
                            	<li class="nav-item">
                            		<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Yearly</a>
                            	</li>
                              </ul>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                          <!--<div class="tab-pane active" id="tabs-1" role="tabpanel">-->
                          <!--  <div id="daily_order" style="height:300px; overflow:hidden;"></div>-->
                          <!--</div>-->
                          <div class="tab-pane active" id="tabs-2" role="tabpanel">
                               <div id="monthly_order" style="height:300px;"></div>
                          </div>
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
        <!--                                <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class="img-fluid rounded" alt="">-->
        <!--                           </td>-->
        <!--                           <td>-->
        <!--                          <h4>James Sukardi</h4>-->
        <!--                          <p>Alexendrai St. London Park</p>-->
        <!--                           </td>-->
        <!--                           </tr>-->
        <!--                            <tr>-->
        <!--                           <td>-->
        <!--                                <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class=" img-fluid rounded" alt="">-->
        <!--                           </td>-->
        <!--                           <td>-->
        <!--                          <h4> Angela Mass</h4>-->
        <!--                          <p> Alexendrai St. London Park</p>-->
        <!--                           </td>-->
        <!--                           </tr>-->
        <!--                           <tr>-->
        <!--                            <td>-->
        <!--                                 <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class="img-fluid rounded" alt="">-->
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
        <!--                    <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class="img-fluid rounded" alt="">-->
        <!--               </td>-->
        <!--               <td>-->
        <!--              <h4>James Sukardi</h4>-->
        <!--              <p>Alexendrai St. London Park</p>-->
        <!--               </td>-->
        <!--               </tr>-->
        <!--                <tr>-->
        <!--               <td>-->
        <!--                    <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class=" img-fluid rounded" alt="">-->
        <!--               </td>-->
        <!--               <td>-->
        <!--              <h4> Angela Mass</h4>-->
        <!--              <p> Alexendrai St. London Park</p>-->
        <!--               </td>-->
        <!--               </tr>-->
        <!--               <tr>-->
        <!--                <td>-->
        <!--                     <img src="<?php echo e(auth()->user()->getFirstMediaUrl('avatar','icon')); ?>" style="width: 50px;" class="img-fluid rounded" alt="">-->
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
                      <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Managers</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('restaurants.index')); ?>" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>Manager Name</th>
                                <th>Manager Email</th>
                                <th><?php echo e(trans('lang.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $manager; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>
                                       <?php echo $manager->name; ?>
                                    </td>
                                    <td><?php echo $manager->email; ?></td>
                                    <td class="text-center">
                                         <a href="<?php echo e(url('/manager_details')); ?>" class="btn  text-center" style="color:#1921FA;"><i class="fa fa-eye"></i></a>
                                     
                                          
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                  <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Riders</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('restaurants.index')); ?>" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                              
                                <th>Rider Name</th>
                                <th>Rider Rating</th>
                                <th><?php echo e(trans('lang.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                
                              
                             
                            <?php $__currentLoopData = $driver; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                 
                                    <td><?php echo $driver->name; ?></td>
                                    <td>
                                        <?php echo $driver->rating; ?>
                                    </td>
                                    <td class="text-center">
                                         <a href="<?php echo route('drivers.index'); ?>" class="btn  text-center" style="color:#1921FA;"><i class="fa fa-eye"></i></a>
                                     
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   <div>
                      <div class="col-lg-12">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">Users</h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('restaurants.index')); ?>" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
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
                                <th><?php echo e(trans('lang.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                  <td><?php echo $users->id; ?></td>
                                      <td> <img src="http://92.42.110.51/~karri/api/assets/customer/<?php echo $users->profile; ?>" height="30px" width="30px"></td>
                                    <td><?php echo $users->name; ?></td>
                                            <td><?php echo $users->email; ?></td>
                                               <td><?php echo $users->phone; ?></td>
                               
                                    <td class="text-center">
                                         <!--<a href="<?php echo e(url('/users_details')); ?>" class="btn  text-center" style="color:#1921FA;"><i class="fa fa-eye"></i></a>-->
                                         <a href="<?php echo e(url('/appCustomers')); ?>" class="btn  text-center" style="color:#1921FA;"><i class="fa fa-eye"></i></a>
                                        
                                     
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
   </div>
        
  <!--<div class="row">-->
  <!--          <div class="col-md-12">-->
  <!--              <div class="card">-->
  <!--                  <div class="card-header no-border">-->
  <!--                      <h3 class="card-title"><?php echo e(trans('lang.fav_menu')); ?></h3>-->
  <!--                      <div class="card-tools">-->


  <!--                      </div>-->
  <!--                  </div>-->
  <!--                  <div class="card-body">-->
  <!--                      <div class="row">-->
  <!--                          <div class="col-md-6">-->
  <!--                              <div class="fav_menus">-->
  <!--                                 <img src="<?php echo e(url('/public/images/restaurant.jpg')); ?>" alt="" class="img-fluid">-->

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
  <!--                                                    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
  <!--                                                  <div class="col-xs-6 col-sm-3">-->
  <!--                                                      <div class="tcb-product-item">-->
  <!--                                                          <div class="tcb-product-photo">-->
  <!--                                                               <div class="tcb-product-rating">-->
  <!--                                                                  <i class="fa fa-star"></i>-->
  <!--                                                                  <a href="#"><?php echo $restaurant->delivery_fee; ?></a>-->
  <!--                                                              </div>-->
  <!--                                                              <div>-->
  <!--                                                             <?php echo getMediaColumn($restaurant, 'image','rounded newImg'); ?>-->
  <!--                                                             </div>-->
  <!--                                                          </div>-->
  <!--                                                          <div class="tcb-product-info">-->
  <!--                                                              <div class="tcb-product-title">-->
  <!--                                                                  <h4 style="text-align: center;"><a href="#"><?php echo $restaurant->name; ?></a></h4>-->
  <!--                                                              </div>-->
  <!--                                                              <div class="tcb-product-price">-->

  <!--                                                                  <div><p style="text-align: center;">₦ <?php echo $restaurant->admin_commission; ?></p></div>-->
  <!--                                                              </div>-->
  <!--                                                          </div>-->
  <!--                                                      </div>-->
  <!--                                                  </div>-->
  <!--                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts_lib'); ?>
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
// <script type="text/javascript">
//       google.charts.load("current", {packages:["corechart"]});
//       google.charts.setOnLoadCallback(drawChart);
//       function drawChart() {
//         var data = google.visualization.arrayToDataTable([
//           ['Order', 'Daily'],
//           ['On Delivery',11],
//           ['Delivered',2],
//           ['Canceled',7]
//         ]);

//         var options = {
//           pieHole: 0.4,
//         };

//         var chart = new google.visualization.PieChart(document.getElementById('daily_order'));
//         chart.draw(data, options);
//       }
// </script>
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order', 'Monthly'],
          ['Preparing',<?php echo $order_status_monthly['preparing']; ?>],
          ['Completed',<?php echo $order_status_monthly['completed']; ?>],
          ['Ready',<?php echo $order_status_monthly['ready']; ?>],
          ['On The Way',<?php echo $order_status_monthly['onway']; ?>],
          ['Delivered',<?php echo $order_status_monthly['delivered']; ?>]
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
                                    <?php if(setting('currency_right', '0') == '0'): ?>
                                        return "<?php echo e(setting('default_currency')); ?> "+value;
                                    <?php else: ?>
                                        return value+" <?php echo e(setting('default_currency')); ?>";
                                        <?php endif; ?>

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
                url: "<?php echo $ajaxEarningUrl; ?>",
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\karri\resources\views/dashboard/index.blade.php ENDPATH**/ ?>