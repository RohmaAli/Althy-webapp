<?php

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
// Route::get('/electronics', function(){
//   $var = Products::where('ProductType', 'Electronics')->get();
//   return $var;
// });
Route::get('/check', function(){
      // $a = App\Models\Category::where('Type2', '=', 'MEDICINE')->get();
      // foreach($a as $b)
      // {
      //   $b->partner_id = 1;
      //   $b->product_type_id = 2;
      //   $b->save();
      // }
      // return $a;

      // $a = App\Models\Category::where('Type2', '=', 'GROCERY')->get();
      // foreach($a as $b)
      // {
      //   $b->partner_id = 2;
      //   $b->product_type_id = 1;
      //   $b->save();
      // }
      // return $a;

      
      // $a = App\Models\Category::where('Type2', '=', 'BAKERY')->get();
      // foreach($a as $b)
      // {
      //   $b->partner_id = 3;
      //   $b->product_type_id = 4;
      //   $b->save();
      // }
      // return $a;


});
Route::get('/testing','WebController@test');

Route::get('/','WebController@index')->name('home');
Route::get('/medicine','WebController@medicine')->name('medicine');
Route::get('/labtests','WebController@labtests')->name('labtests');
Route::get('/shop/{type}/{category}/{level}','WebController@shop')->name('shop');
Route::get('/shelves/{type}/{category}/{level}','WebController@shelves')->name('shelves');
Route::get('/products/{type}/{category}','WebController@products')->name('products');
Route::get('/productSearch','WebController@productSearch')->name('productSearch');
Route::get('/covid','WebController@covid')->name('covid');
Route::get('/services','WebController@services')->name('services');
Route::get('/cart','WebController@cart')->name('cart');
Route::get('/sale','WebController@sale')->name('sale');
Route::get('/checkout','WebController@checkout')->name('checkout');
Route::post('/postCheckout','WebController@postCheckout')->name('postCheckout');
Route::get('/successOrder','WebController@successOrder')->name('successOrder');
Route::get('/profile','WebController@profile')->name('profile');
Route::post('/profilePost','WebController@profilePost')->name('profilePost');
Route::get('/contact','WebController@contact')->name('contact');
Route::get('/orders','WebController@orders')->name('orders');
Route::get('/customerLogin','WebController@customerLogin')->name('customerLogin');
Route::post('/customerLoginPost','WebController@customerLoginPost')->name('customerLoginPost');
Route::get('/customerRegister','WebController@customerRegister')->name('customerRegister');
Route::post('/customerRegisterPost','WebController@customerRegisterPost')->name('customerRegisterPost');
Route::get('/verifyPhone','WebController@verifyPhone')->name('verifyPhone');
Route::post('/verifyPhonePost','WebController@verifyPhonePost')->name('verifyPhonePost');
Route::get('/medicineSearch','WebController@medicineSearch')->name('medicineSearch');
Route::get('/labtestSearch','WebController@labtestSearch')->name('labtestSearch');
Route::post('/addToCart','WebController@addToCart')->name('addToCart');
Route::post('/addToCartRemove','WebController@addToCartRemove')->name('addToCartRemove');
Route::get('/updateTotals','WebController@updateTotals')->name('updateTotals');
Route::get('/removeFromCart/{id}/{type}/{cartID}','WebController@removeFromCart')->name('removeFromCart');
Route::get('/customerLogout','WebController@customerLogout')->name('customerLogout');
Route::get('/globalSearch','WebController@globalSearch')->name('globalSearch');
Route::get('/terms','WebController@terms')->name('terms');
Route::get('/returns','WebController@returns')->name('returns');
Route::get('/productDetails/{productID}','WebController@productDetails')->name('productDetails');
Route::get('/covid','WebController@covid')->name('covid');
Route::get('/express','WebController@express')->name('express');
Route::get('/althyapp','WebController@althyapp')->name('althyapp');
Route::get('/plasmaDonors','WebController@plasmaDonors')->name('plasmaDonors');
Route::get('/plasmaReceivers','WebController@plasmaReceivers')->name('plasmaReceivers');
Route::post('/searchShelf','WebController@searchShelf')->name('searchShelf');
Route::post('/searchShelfsub','WebController@searchShelfsub')->name('searchShelfsub');
Route::get('/upload','WebController@upload')->name('upload');
Route::post('/uploadPost','WebController@uploadPost')->name('uploadPost');
Route::get('/getShelf/{catType}','WebController@getShelf')->name('getShelf');





Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//API Routes
Route::group(['prefix'=>'api','as'=>'api'], function(){
  Route::group(['prefix'=>'v1','as'=>'v1'], function(){
    Route::group(['prefix'=>'user','as'=>'user'], function(){
      Route::get('/', 'API\UserController@index')->name('home');
      Route::get('menu', 'API\UserController@menu')->name('menu');
      Route::get('customerDetails/{id}', 'API\UserController@customerDetails')->name('customerDetails');
      Route::post('login', 'API\UserController@login')->name('login');
      Route::post('register', 'API\UserController@register')->name('register');
      Route::post('updateProfile', 'API\UserController@updateProfile')->name('updateProfile');
      Route::post('searchProduct', 'API\UserController@searchProduct')->name('searchProduct');
      Route::get('productDetails/{id}', 'API\UserController@productDetails')->name('productDetails');
      Route::get('getServiceRate', 'API\UserController@getServiceRate')->name('getServiceRate');
      Route::get('addresses/{ConsumerID}', 'API\UserController@addresses')->name('addresses');
      Route::get('getCatName/{CategoryID}/{Level}', 'API\UserController@getCatName')->name('getCatName');
      Route::get('getProducts/{Category}/{Level}', 'API\UserController@getProducts')->name('getProducts');
      Route::get('getHomeCategories', 'API\UserController@getHomeCategories')->name('getHomeCategories');
      Route::post('postAddress', 'API\UserController@postAddress')->name('postAddress');
      Route::get('orders/{ConsumerID}', 'API\UserController@orders')->name('orders');
      Route::get('getOrderDetails/{OrderID}', 'API\UserController@getOrderDetails')->name('getOrderDetails');
      Route::post('postOrder', 'API\UserController@postOrder')->name('postOrder');
      Route::post('postServiceOrder', 'API\UserController@postServiceOrder')->name('postServiceOrder');
      Route::post('postAmbulanceOrder', 'API\UserController@postAmbulanceOrder')->name('postAmbulanceOrder');
      Route::post('postPhysiotherapyOrder', 'API\UserController@postPhysiotherapyOrder')->name('postPhysiotherapyOrder');
      Route::post('postTranscriptOrder', 'API\UserController@postTranscriptOrder')->name('postTranscriptOrder');
      Route::post('verifyPhone', 'API\UserController@verifyPhone')->name('verifyPhone');
      Route::get('SetOneSignalID/{UserID}/{Type}/{OneSignalID}', 'API\UserController@SetOneSignalID')->name('SetOneSignalID');
    });

    Route::group(['prefix'=>'rider','as'=>'rider'], function(){
      Route::get('/', 'API\RiderController@index')->name('home');
      Route::post('riderLogin', 'API\RiderController@riderLogin')->name('riderLogin');
      Route::get('unclaimedOrders/{RiderID}', 'API\RiderController@unclaimedOrders')->name('unclaimedOrders');
      Route::get('claimedOrders/{RiderID}', 'API\RiderController@claimedOrders')->name('claimedOrders');
      Route::get('orderHistory/{RiderID}', 'API\RiderController@orderHistory')->name('orderHistory');
      Route::get('orderDetails/{OrderID}/{RiderID}', 'API\RiderController@orderDetails')->name('orderDetails');
      Route::get('claimOrder/{OrderID}/{RiderID}', 'API\RiderController@claimOrder')->name('claimOrder');
      Route::get('completeOrder/{OrderID}/{RiderID}', 'API\RiderController@completeOrder')->name('completeOrder');
      Route::get('reached/{OrderID}/{RiderID}', 'API\RiderController@reached')->name('reached');
      Route::get('addPrice/{OrderID}/{RiderID}/{price}', 'API\RiderController@addPrice')->name('addPrice');
      Route::post('updateLocation', 'API\RiderController@updateLocation')->name('updateLocation');
      Route::get('SetOneSignalID/{UserID}/{Type}/{OneSignalID}', 'API\RiderController@SetOneSignalID')->name('SetOneSignalID');
    });

    Route::group(['prefix'=>'admin','as'=>'admin'], function(){
      Route::get('/', 'API\AdminController@index')->name('home');
      Route::post('adminLogin', 'API\AdminController@adminLogin')->name('adminLogin');
      Route::get('allorders', 'API\AdminController@allorders')->name('allorders');
      Route::get('orderDetailsAdmin/{OrderType}/{OrderID}', 'API\AdminController@orderDetailsAdmin')->name('orderDetailsAdmin');
      Route::get('unassignedOrders', 'API\AdminController@unassignedOrders')->name('unassignedOrders');
      Route::get('incompleteOrders', 'API\AdminController@incompleteOrders')->name('incompleteOrders');
      Route::get('completeOrders', 'API\AdminController@completeOrders')->name('completeOrders');
      Route::get('SetOneSignalID/{UserID}/{Type}/{OneSignalID}', 'API\AdminController@SetOneSignalID')->name('SetOneSignalID');
      Route::get('getDashboardData', 'API\AdminController@getDashboardData')->name('getDashboardData');
      Route::get('searchProductAdmin/{term}', 'API\AdminController@searchProductAdmin')->name('searchProductAdmin');
      Route::post('adminCreateOrder', 'API\AdminController@adminCreateOrder')->name('adminCreateOrder');
      Route::get('getAmbulanceOrders', 'API\AdminController@getAmbulanceOrders')->name('getAmbulanceOrders');
      Route::get('getEMITOrders', 'API\AdminController@getEMITOrders')->name('getEMITOrders');
      Route::get('getPhysiotherapyOrders', 'API\AdminController@getPhysiotherapyOrders')->name('getPhysiotherapyOrders');
      Route::post('getOrders', 'API\AdminController@getOrders')->name('getOrders');
      Route::get('getRiders', 'API\AdminController@getRiders')->name('getRiders');
      Route::get('getVendors', 'API\AdminController@getVendors')->name('getVendors');
      Route::get('getShippers', 'API\AdminController@getShippers')->name('getShippers');
      Route::post('addNote', 'API\AdminController@addNote')->name('addNote');
      Route::post('addNoteVendor', 'API\AdminController@addNoteVendor')->name('addNoteVendor');
      Route::post('addNoteRider', 'API\AdminController@addNoteRider')->name('addNoteRider');
      Route::post('assignRider', 'API\AdminController@assignRider')->name('assignRider');
      Route::post('assignVendor', 'API\AdminController@assignVendor')->name('assignVendor');
      Route::post('assignLocality', 'API\AdminController@assignLocality')->name('assignLocality');
      Route::post('assignShipping', 'API\AdminController@assignShipping')->name('assignShipping');
      Route::post('updateStatus', 'API\AdminController@updateStatus')->name('updateStatus');
      Route::get('vendorReport', 'API\AdminController@vendorReport')->name('vendorReport');
      Route::post('receivePayment', 'API\AdminController@receivePayment')->name('receivePayment');
      Route::post('sendPayment', 'API\AdminController@sendPayment')->name('sendPayment');
      Route::get('getOrderDetails/{OrderID}', 'API\AdminController@getOrderDetails')->name('getOrderDetails');
      Route::get('getVendorOrders/{VendorID}', 'API\AdminController@getVendorOrders')->name('getVendorOrders');
    });
  });
});

//Admin Routes

Route::group(['prefix'=>'managerPortal','as'=>'managerPortal.'], function(){
  //AmbulanceRequests Routes
  Route::get('/','Management\WebController@index')->name('home');
  Route::get('/ambulance', 'Management\AmbulanceController@index')->name('ambulance');
  Route::get('/ambulanceAdd', 'Management\AmbulanceController@ambulanceAdd')->name('ambulanceAdd');
  Route::post('/ambulanceAddPost', 'Management\AmbulanceController@ambulanceAddPost')->name('ambulanceAddPost');
  Route::get('/ambulanceEdit/{id}', 'Management\AmbulanceController@ambulanceEdit')->name('ambulanceEdit');
  Route::post('/ambulanceEditPost', 'Management\AmbulanceController@ambulanceEditPost')->name('ambulanceEditPost');
  Route::get('/ambulanceDetails/{id}', 'Management\AmbulanceController@ambulanceDetails')->name('ambulanceDetails');
  Route::get('/ambulanceRemove/{id}', 'Management\AmbulanceController@ambulanceRemove')->name('ambulanceRemove');

  //Consumers Routes
  Route::get('/consumer', 'Management\ConsumerController@index')->name('consumer');
  Route::get('/consumerAdd', 'Management\ConsumerController@consumerAdd')->name('consumerAdd');
  Route::post('/consumerAddPost', 'Management\ConsumerController@consumerAddPost')->name('consumerAddPost');
  Route::get('/consumerEdit/{id}', 'Management\ConsumerController@consumerEdit')->name('consumerEdit');
  Route::post('/consumerEditPost', 'Management\ConsumerController@consumerEditPost')->name('consumerEditPost');
  Route::get('/consumerDetails/{id}', 'Management\ConsumerController@consumerDetails')->name('consumerDetails');
  Route::get('/consumerRemove/{id}', 'Management\ConsumerController@consumerRemove')->name('consumerRemove');


  //Medicine Routes
  Route::get('/products', 'Management\ProductsController@index')->name('products');
  Route::get('/productsAdd', 'Management\ProductsController@productsAdd')->name('productsAdd');
  Route::post('/productsAddPost', 'Management\ProductsController@productsAddPost')->name('productsAddPost');
  Route::get('/productsEdit/{id}', 'Management\ProductsController@productsEdit')->name('productsEdit');
  Route::post('/productsEditPost', 'Management\ProductsController@productsEditPost')->name('productsEditPost');
  Route::post('/productsSearch', 'Management\ProductsController@productsSearch')->name('productsSearch');
  Route::get('/productsDetails/{id}', 'Management\ProductsController@productsDetails')->name('productsDetails');
  Route::get('/productsRemove/{id}', 'Management\ProductsController@productsRemove')->name('productsRemove');


  //Orders Routes
  Route::get('/orders', 'Management\OrdersController@index')->name('orders');
  Route::get('/ordersDetails/{id}', 'Management\OrdersController@ordersDetails')->name('ordersDetails');

  //Physiotherapy Routes
  Route::get('/physiotherapy', 'Management\PhysiotherapyController@index')->name('physiotherapy');
  Route::get('/physiotherapyAdd', 'Management\PhysiotherapyController@physiotherapyAdd')->name('physiotherapyAdd');
  Route::post('/physiotherapyAddPost', 'Management\PhysiotherapyController@physiotherapyAddPost')->name('physiotherapyAddPost');
  Route::get('/physiotherapyEdit/{id}', 'Management\PhysiotherapyController@physiotherapyEdit')->name('physiotherapyEdit');
  Route::post('/physiotherapyEditPost', 'Management\PhysiotherapyController@physiotherapyEditPost')->name('physiotherapyEditPost');
  Route::get('/physiotherapyDetails/{id}', 'Management\PhysiotherapyController@physiotherapyDetails')->name('physiotherapyDetails');
  Route::get('/physiotherapyRemove/{id}', 'Management\PhysiotherapyController@physiotherapyRemove')->name('physiotherapyRemove');

  //Riders Routes
  Route::get('/riders', 'Management\RidersController@index')->name('riders');
  Route::get('/ridersAdd', 'Management\RidersController@ridersAdd')->name('ridersAdd');
  Route::post('/ridersAddPost', 'Management\RidersController@ridersAddPost')->name('ridersAddPost');
  Route::get('/ridersEdit/{id}', 'Management\RidersController@ridersEdit')->name('ridersEdit');
  Route::post('/ridersEditPost', 'Management\RidersController@ridersEditPost')->name('ridersEditPost');
  Route::get('/ridersDetails/{id}', 'Management\RidersController@ridersDetails')->name('ridersDetails');
  Route::get('/ridersRemove/{id}', 'Management\RidersController@ridersRemove')->name('ridersRemove');

  //Services Routes
  Route::get('/services', 'Management\ServicesController@index')->name('services');
  Route::get('/servicesAdd', 'Management\ServicesController@servicesAdd')->name('servicesAdd');
  Route::post('/servicesAddPost', 'Management\ServicesController@servicesAddPost')->name('servicesAddPost');
  Route::get('/servicesEdit/{id}', 'Management\ServicesController@servicesEdit')->name('servicesEdit');
  Route::post('/servicesEditPost', 'Management\ServicesController@servicesEditPost')->name('servicesEditPost');
  Route::get('/servicesDetails/{id}', 'Management\ServicesController@servicesDetails')->name('servicesDetails');
  Route::get('/servicesRemove/{id}', 'Management\ServicesController@servicesRemove')->name('servicesRemove');
});
