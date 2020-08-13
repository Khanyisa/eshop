<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('products','ProductsController');
Route::resource('shops','ShopsController');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('registerShop',function(){
    return view('auth.registerShop');
})->name('shop');
Route::get('registerUser', function(){
    return view('auth.registerUser');
})->name('user');

Route::post('createUser', 'Auth\RegisterController@createUser');
Route::post('createShop', 'Auth\RegisterController@createShop');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/profile', 'HomeController@index');
Route::get('/products', 'ProductsController@index');
Route::get('/product/{slug}', 'ProductsController@show');
Route::get('/products/quick-view/{slug}', 'ProductsController@quickView');

Route::get('cart/index', 'CartController@index');
Route::get('cart/remove/{cartID}', 'CartController@destroy');
Route::post('product/addToCart/{productID}','ProductController@addToCart'
);
Route::post('cart/update', 'CartController@update');
Route::post('cart', 'CartController@store');

Route::get('orders/checkout', 'OrderController@checkout');
Route::post('orders/checkout', 'OrderController@doCheckout');
Route::post('orders/shipping-cost', 'OrderController@shippingCost');
Route::post('orders/set-shipping', 'OrderController@setShipping');
Route::get('orders/received/{orderID}', 'OrderController@received');
Route::get('orders/cities', 'OrderController@cities');
Route::get('orders', 'OrderController@index');
Route::get('orders/{orderID}', 'OrderController@show');

Route::post('payments/notification', 'PaymentController@notification');
Route::get('payments/completed', 'PaymentController@completed');
Route::get('payments/failed', 'PaymentController@failed');
Route::get('payments/unfinish', 'PaymentController@unfinish');

Route::resource('favorites', 'FavoriteController');

Route::get('profile', 'Auth\ProfileController@index');
Route::post('profile', 'Auth\ProfileController@update');

Route::group(
	['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
	function () {
		Route::get('dashboard', 'DashboardController@index');
		Route::resource('categories', 'CategoryController');

		
		Route::resource('products', 'ProductsController');
		Route::get('products/{productID}/images', 'ProductsController@images')->name('products.images');
		Route::get('products/{productID}/add-image', 'ProductsController@addImage')->name('products.add_image');
		Route::post('products/images/{productID}', 'ProductsController@uploadImage')->name('products.upload_image');
		Route::delete('products/images/{imageID}', 'ProductsController@removeImage')->name('products.remove_image');

		Route::resource('attributes', 'AttributeController');
		Route::get('attributes/{attributeID}/options', 'AttributeController@options')->name('attributes.options');
		Route::get('attributes/{attributeID}/add-option', 'AttributeController@add_option')->name('attributes.add_option');
		Route::post('attributes/options/{attributeID}', 'AttributeController@store_option')->name('attributes.store_option');
		Route::delete('attributes/options/{optionID}', 'AttributeController@remove_option')->name('attributes.remove_option');
		Route::get('attributes/options/{optionID}/edit', 'AttributeController@edit_option')->name('attributes.edit_option');
		Route::put('attributes/options/{optionID}', 'AttributeController@update_option')->name('attributes.update_option');
	
		Route::resource('roles', 'RoleController');
		Route::resource('users', 'UserController');

		Route::get('orders/trashed', 'OrderController@trashed');
		Route::get('orders/restore/{orderID}', 'OrderController@restore');
		Route::resource('orders', 'OrderController');
		Route::get('orders/{orderID}/cancel', 'OrderController@cancel');
		Route::put('orders/cancel/{orderID}', 'OrderController@doCancel');
		Route::post('orders/complete/{orderID}', 'OrderController@doComplete');

		Route::resource('shipments', 'ShipmentController');

//		Route::resource('slides', 'SlideController');
//		Route::get('slides/{slideID}/up', 'SlideController@moveUp');
//		Route::get('slides/{slideID}/down', 'SlideController@moveDown');

		Route::get('reports/revenue', 'ReportController@revenue');
		Route::get('reports/product', 'ReportController@product');
		Route::get('reports/inventory', 'ReportController@inventory');
		Route::get('reports/payment', 'ReportController@payment');
	}
);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});
