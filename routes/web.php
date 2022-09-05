<?php
/**
 * File name: web.php
 */

 use App\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//  Route::get('/contact', function () {
//   return view('contact.index');
// });

 Route::get('/analytics', function () {
   return view('analytics.index');
});

Route::get('view', function () {
    return view('orders.chart');
});
Route::get('orders/paid', function() {
    return view('orders.paid');
});
Route::get('orders/undelivered', function () {
    return view('orders.undelivered');
});
/*Route::get('earnings/DailyReport', function () {
    return view('earnings.daily_report');
}); */

Route::get('earnings/MonthlyReport', function () {
    return view('earnings.monthly_report');
});

Route::get('earnings/YearlyReport', function () {
    return view('earnings.yearly_report');
});
Route::get('restaurants/file_upload', function () {
    return view('restaurants.file_upload');
});
//Route::get('food_orders/invoice', function () {
//    return view('food_orders.invoice');
//});

Route::get('orders/completed','OrderController@completed_orders');
Route::get('orders/live_orders','OrderController@live_orders');

Route::get('orders/progress_orders','OrderController@progress_orders');
// Route::get('/about', 'AboutController@index');



Route::get('/aboutedit', 'AboutController@edit');
Route::get('/enquiry', 'EnquiryController@index');
Route::get('/search', 'SearchController@index');
Route::get('/customers', 'CustomerController@index');
Route::get('/contact', 'ContactController@index');
Route::get('/submitmail', 'ContactController@senmail');
// Route::get('/about', 'AboutController@index2');
Route::get('/settings/mobile/content', 'ContentController@index');
Route::post('settings/mobile/content/update', 'ContentController@update');
Route::get('/settings/mobile/color', 'ColorController@index');
Route::post('/settings/mobile/color/update', 'ColorController@update');

Route::get('/about', 'AboutController@index2');

Route::post('restaurants/products', 'ProductController@store');

Route::get('restaurants/invoice','RestaurantController@totalRestaurant');
Route::get('restaurants/invoice_pdf','RestaurantController@createPDF');

Route::post('sendmail','RestaurantController@sendMail');
Route::get('earnings/earning_report','EarningController@totalEarning');
 //Route::get('contact', 'ContactController')->name('contact.index');
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

Route::get('payments/failed', 'PayPalController@index')->name('payments.failed');
Route::get('payments/razorpay/checkout', 'RazorPayController@checkout');
Route::post('payments/razorpay/pay-success/{userId}/{deliveryAddressId?}/{couponCode?}', 'RazorPayController@paySuccess');
Route::get('payments/razorpay', 'RazorPayController@index');

Route::get('payments/paypal/express-checkout', 'PayPalController@getExpressCheckout')->name('paypal.express-checkout');
Route::get('payments/paypal/express-checkout-success', 'PayPalController@getExpressCheckoutSuccess');
Route::get('payments/paypal', 'PayPalController@index')->name('paypal.index');

Route::get('firebase/sw-js', 'AppSettingController@initFirebase');


Route::get('storage/app/public/{id}/{conversion}/{filename?}', 'UploadController@storage');
Route::middleware('auth')->group(function () {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('/', 'DashboardController@index')->name('dashboard');   // indexpage

    Route::post('uploads/store', 'UploadController@store')->name('medias.create');
    Route::get('users/profile', 'UserController@profile')->name('users.profile');
    Route::post('users/remove-media', 'UserController@removeMedia');
    Route::resource('users', 'UserController');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['middleware' => ['permission:medias']], function () {
        Route::get('uploads/all/{collection?}', 'UploadController@all');
        Route::get('uploads/collectionsNames', 'UploadController@collectionsNames');
        Route::post('uploads/clear', 'UploadController@clear')->name('medias.delete');
        Route::get('medias', 'UploadController@index')->name('medias');
        Route::get('uploads/clear-all', 'UploadController@clearAll');
    });

    Route::group(['middleware' => ['permission:permissions.index']], function () {
        Route::get('permissions/role-has-permission', 'PermissionController@roleHasPermission');
        Route::get('permissions/refresh-permissions', 'PermissionController@refreshPermissions');
    });
    Route::group(['middleware' => ['permission:permissions.index']], function () {
        Route::post('permissions/give-permission-to-role', 'PermissionController@givePermissionToRole');
        Route::post('permissions/revoke-permission-to-role', 'PermissionController@revokePermissionToRole');
    });

    Route::group(['middleware' => ['permission:app-settings']], function () {
        Route::prefix('settings')->group(function () {
            Route::resource('permissions', 'PermissionController');
            Route::resource('roles', 'RoleController');
            Route::resource('customFields', 'CustomFieldController');
            Route::resource('currencies', 'CurrencyController')->except([
                'show'
            ]);
            Route::get('users/login-as-user/{id}', 'UserController@loginAsUser')->name('users.login-as-user');

            Route::patch('update', 'AppSettingController@update');
            Route::patch('translate', 'AppSettingController@translate');
            Route::get('sync-translation', 'AppSettingController@syncTranslation');
            Route::get('clear-cache', 'AppSettingController@clearCache');
            Route::get('check-update', 'AppSettingController@checkForUpdates');
            // disable special character and number in route params
            Route::get('/{type?}/{tab?}', 'AppSettingController@index')
                ->where('type', '[A-Za-z]*')->where('tab', '[A-Za-z]*')->name('app-settings');
        });
    });
     
    Route::post('cuisines/remove-media', 'CuisineController@removeMedia');
    Route::resource('cuisines', 'CuisineController')->except([
        'show'
    ]);

    Route::post('restaurants/remove-media', 'RestaurantController@removeMedia');
    Route::get('requestedRestaurants', 'RestaurantController@requestedRestaurants')->name('requestedRestaurants.index'); //adeed
    Route::resource('restaurants', 'RestaurantController')->except([
        'show'
    ]);

    Route::post('categories/remove-media', 'CategoryController@removeMedia');
    Route::resource('categories', 'CategoryController')->except([
        'show'
    ]);

    Route::resource('faqCategories', 'FaqCategoryController')->except([
        'show'
    ]);

    Route::resource('orderStatuses', 'OrderStatusController')->except([
        'create', 'store', 'destroy'
    ]);;

    Route::post('foods/remove-media', 'FoodController@removeMedia');
    Route::resource('foods', 'FoodController')->except([
        'show'
    ]);

    Route::post('galleries/remove-media', 'GalleryController@removeMedia');
    Route::resource('galleries', 'GalleryController')->except([
        'show'
    ]);

    Route::resource('foodReviews', 'FoodReviewController')->except([
        'show'
    ]);


    Route::resource('nutrition', 'NutritionController')->except([
        'show'
    ]);

    Route::post('extras/remove-media', 'ExtraController@removeMedia');
    Route::resource('extras', 'ExtraController');

    Route::resource('payments', 'PaymentController')->except([
        'create', 'store', 'edit', 'destroy'
    ]);;

    Route::resource('faqs', 'FaqController')->except([
        'show'
    ]);
    Route::resource('restaurantReviews', 'RestaurantReviewController')->except([
        'show'
    ]);

    Route::resource('favorites', 'FavoriteController')->except([
        'show'
    ]);

    Route::resource('orders', 'OrderController');



    Route::resource('notifications', 'NotificationController')->except([
        'create', 'store', 'update', 'edit',
    ]);;

    Route::resource('carts', 'CartController')->except([
        'show', 'store', 'create'
    ]);
    Route::resource('deliveryAddresses', 'DeliveryAddressController')->except([
        'show'
    ]);

    Route::resource('drivers', 'DriverController')->except([
        'show'
    ]);


    Route::resource('earnings', 'EarningController')->except([
        'show', 'edit', 'update'
    ]);

    Route::resource('driversPayouts', 'DriversPayoutController')->except([
        'show', 'edit', 'update'
    ]);

    Route::resource('restaurantsPayouts', 'RestaurantsPayoutController')->except([
        'show', 'edit', 'update'
    ]);

    Route::resource('extraGroups', 'ExtraGroupController')->except([
        'show'
    ]);

    Route::post('extras/remove-media', 'ExtraController@removeMedia');

    Route::resource('extras', 'ExtraController')->except([
        'show'
    ]);
    Route::resource('coupons', 'CouponController')->except([
        'show'
    ]);
	 Route::resource('coupons', 'CouponController')->except([
        'show'
    ]);

    Route::post('slides/remove-media','SlideController@removeMedia');
    Route::resource('slides', 'SlideController')->except([
        'show'
    ]);










    Route::get('restaurants/vendors', 'RestaurantController@vendors'); //added
    // Route::get('restaurants/add_vendors_details', 'RestaurantController@add_vendors_details');


    Route::get('restaurants/add_vendors_details', function () {
   return view('vendors.index');

});

Route::post('save_vendor','RestaurantController@save_vendor');
Route::get('super_admin/category/edit/{id}', 'VendorController@edit');
Route::post('super_admin/category/update/{id}', 'VendorController@update');
Route::get('super_admin/category/delete/{id}', 'VendorController@delete');

 // Route::get('show_vendors', 'VendorController@index');
 // Route::get('show_vendors', 'VendorController@returnAjaxData');
  Route::get('show_vendorss', 'VendorController@returnAjaxData');

 Route::get('show_vendorsa', function () {
    return view('vendors.demoo');
});

Route::get('show_vendors', 'VendorController@index');


  Route::get('add_promotion', 'PromotionController@index');
    Route::post('save_promotion', 'PromotionController@save_promotion');
    Route::get('get_promotions', 'PromotionController@get_promotions');
    Route::get('super_admin/promotion/edit/{id}', 'PromotionController@edit');
    Route::get('super_admin/promotion/delete/{id}', 'PromotionController@destroy');
     Route::get('users/login-as-user/{id}', 'UserController@loginAsUser')->name('users.login-as-user');


// Route::get('add_promotion', function () {
// return view('vendors.promotion');
//
// });


Route::get('/manager_details', 'ManagerController@index');
Route::get('super_admin/managers/edit/{id}', 'ManagerController@edit');
Route::post('super_admin/managers/update/{id}', 'ManagerController@update');
Route::get('super_admin/managers/delete/{id}', 'ManagerController@delete');
Route::post('super_admin/save_manager', 'ManagerController@save_manager');
Route::get('super_admin/add_manager', 'ManagerController@add_manager');



Route::get('/managerDashboard', 'ManagerDashboardController@index');
Route::get('/managerReview', 'ManagerReviewController@index');
Route::get('/foodRestaurantReview', 'FoodRestaurantReviewController@index');
Route::get('/managerCoupons', 'ManagerCouponController@index');
Route::get('/restaurantCoupons', 'RestaurantCouponController@index');
Route::get('/users_details', 'UsersController@index');

Route::get('/store', 'ContactController@store');


Route::get('/contactView', 'ContactController@show');
Route::get('/contactViewManager', 'ContactController@showManager');
Route::get('/notificationsManager', 'NotificationController@indexManager');
Route::get('/notificationsRestaurant', 'NotificationController@indexRestaurant');
Route::get('/appCustomers', 'UsersController@indexCustomers');
Route::get('/termsOfServices', 'TermsController@index');
Route::get('/privacy', 'PrivacyController@index');
Route::get('/privacy/edit/{id}', 'PrivacyController@edit');
Route::post('/privacy/update/{id}', 'PrivacyController@update');
Route::get('/indexAbout', 'AboutController@index');
Route::get('/about', 'AboutController@index2');
Route::post('/edit', 'AboutController@edit');
Route::get('/about/edit/{id}', 'AboutController@edit');
Route::post('/about/update/{id}','AboutController@update');
Route::get('/terms', 'TermsController@index');
Route::post('/edit', 'TermsController@edit');
Route::get('/terms/edit/{id}', 'TermsController@edit');
Route::post('/terms/update/{id}','TermsController@update');
Route::get('/liveOrderTrack', 'TrackController@index');
Route::get('/track/view/{id}', 'TrackController@track');
Route::get('/pushNotifications', 'PushNotificationsController@index');
Route::post('/pushNotifications/send_notification', 'PushNotificationsController@send_notification');

});
