<?php
use Illuminate\Http\Request;
use App\Events\SendLocation;

Route::get('/', function () {
    return view('first');
});


Route::group(['namespace'=>'Admin\AdminAuth'], function () {
    Route::get('register', 'AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'AdminRegisterController@register')->name('admin.register.save');
    Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'AdminLoginController@login')->name('admin.login.save');
    //Route::get('logout', 'AdminLoginController@logout')->name('logout');
	Route::post('/admin/home/logout', 'AdminLoginController@logout')->name('alogout');
    Route::get('password/reset', 'AdminForgotPasswordController@showLinkResetForm')->name('password.request');
    Route::post('password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::post('password/reset', 'AdminResetPasswordController@reset');
    Route::get('password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('password.reset');
    //the routes cannot be commented because it is used in other controllers
});

Route::get('/verify-admin/{code}', function($code) {
    return view('admin.admin-auth.admin-activate', ['code'=>$code]);
})->name('activate.user');

Route::post('/verify-admin/{code}', 'Admin\AdminAuth\AdminActivationController@activateAdmin')->name('activate.admin');

Route::view('/admin/home', 'admin.mainmenu')->middleware('admin')->name('admin.home');

Route::group(['namespace'=>'Admin', 'middleware'=>'admin'], function () {
    Route::get('/myaccount', 'AdminController@myaccount')->name('admin.myaccount');
    Route::post('/myaccount', 'AdminController@update')->name('admin.update');
});


Route::group(['namespace'=>'Vehicle', 'prefix'=>'vehicles', 'middleware'=>'admin'], function() {
    Route::get('/', 'VehicleController@index')->name('vehicle.view');
    Route::get('/create', 'VehicleController@create')->name('vehicle.new');
    Route::post('/', 'VehicleController@store')->name('vehicle.store');
    //**Route::get('{vehicle}/edit', 'VehicleController@edit');
    //**Route::post('{vehicle}', 'VehicleController@update')->name('vehicle.update');
    //**Route::delete('/{vehicle}', 'VehicleController@destroy');

    Route::get('/{vehicle}', 'VehicleController@edit')->name('vehicle.edit');
    Route::post('/{vehicle}', 'VehicleController@update')->name('vehicle.update');
    //**Route::delete('/{vehicle}', 'VehicleController@destroy'); //Already working code
    Route::delete('/delete/{vehicle}', 'VehicleController@destroy');

});

Route::post('admin/home', 'Vehicle\VehicleController@export')->middleware('admin')->name('report.export');


Route::group(['namespace'=>'Driver', 'prefix'=>'drivers', 'middleware'=>'admin'], function () {
    Route::get('/', 'DriverAdminController@index')->name('driver.view');
    Route::get('/create', 'DriverAuth\DriverRegisterController@showRegistrationForm')->name('driver.new');
    //Route::post('/', 'DriverAuth\DriverRegisterController@store')->name('driver.store');
    Route::post('/', 'DriverAuth\DriverRegisterController@register')->name('driver.store');
    /*
    Route::get('{driver}/edit', 'DriverAdminController@edit')->name('driver.edit');
    Route::post('{vehicle}','DriverAdminController@update')->name('driver.update');
    Route::delete('/{driver}','DriverAdminController@destroy');
    */
    Route::get('/{driver}', 'DriverAdminController@edit')->name('driver.edit');
    Route::post('/{driver}', 'DriverAdminController@update')->name('driver.update');
    Route::delete('/{driver}', 'DriverAdminController@destroy');
});

Route::get('/verify-driver/{code}', function($code) {
    return view('driver.driver-auth.driver-activate', ['code'=>$code]);
})->name('activate.driver');

Route::post('/verify-driver/{code}', 'Driver\DriverAuth\DriverActivationController@activateDriver');

Route::group(['namespace'=>'Driver\DriverAuth'], function () {
    Route::get('driver-login', 'DriverLoginController@showLoginForm')->name('driver.login');
    Route::post('driver-login', 'DriverLoginController@login')->name('driver.login.save');
  	Route::post('logout', 'DriverLoginController@logout')->name('driver.logout');
    Route::get('driver-password/reset', 'DriverForgotPasswordController@showLinkResetForm')->name('driver-password.request');
    Route::post('driver-password/email', 'DriverForgotPasswordController@sendResetLinkEmail')->name('driver-password.email');
    Route::post('driver-password/reset', 'DriverResetPasswordController@reset');
    Route::get('driver-password/reset/{token}', 'DriverResetPasswordController@showResetForm')->name('driver-password.reset');

});

Route::view('/driver/home', 'driver.driver-home')->middleware('driver')->name('driver.home');

Route::group(['middleware'=>'driver', 'namespace'=>'Driver'], function () {
    Route::get('/driver-profile', 'DriverController@index');
    Route::post('/driver-profile/', 'DriverController@update')->name('driver.myaccount');
});

Route::get('/location', 'LocationController@getLocation');
//**Route::post('/location', 'LocationController@getLocation');

/*
Route::get('/location', function (Request $request) {
    $lat = $request->input('lat');
    $long = $request->input('long');
    $location = ["lat"=>$lat, "long"=>$long];
    event(new SendLocation($location));
    return response()->json(['status'=>'success', 'data'=>$location]);
})->middleware('admin');
*/

/*
Route::get('/admin/home/map', function() {
	return view('welcome');
})->middleware('admin');
*/






