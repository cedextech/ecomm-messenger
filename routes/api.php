<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$routeGroup = [
    'middleware' => ['verify-bot-engine', 'verify-facebook-page', 'cors'],
    'prefix' => 'v1', 
    'namespace' => 'Api\v1'
];

Route::group($routeGroup, function() {
    Route::get('/products', 'ProductController@index');
    Route::get('/products/{productId}', 'ProductController@show');
    Route::get('/products/categories/{categoryId}', 'ProductController@category');

    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/{categoryId}', 'CategoryController@show');

    Route::get('/shops', 'ShopController@index');
    Route::get('/shops/hours', 'WorkingHourController@index');
    Route::get('/shops/services', 'ShopController@services');
    Route::get('/shops/accessToken', 'ShopController@accessToken');

    Route::get('/cart', 'CartController@index');
    Route::post('/cart', 'CartController@store');
    Route::delete('/cart/clear', 'CartController@destroy');
    Route::delete('/cart/remove', 'CartController@remove');

    Route::post('/checkout/getUrl', 'CheckoutController@getUrl');
    Route::post('/checkout/service', 'CheckoutController@updateService');

    Route::get('/orders/{orderReference}', 'OrderController@show');

    Route::post('/customers', 'CustomerController@store');
});

$routeGroup = [
    'middleware' => ['cors'],
    'prefix' => 'v1', 
    'namespace' => 'Api\v1'
];

Route::group($routeGroup, function() {
    Route::post('/orders', 'WebOrderController@store');
});