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

// Product Website
Route::group(['middleware' => 'use-language'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');

    Route::get('ecommerce-chatbot', 'ChatbotController@ecommerce');
    Route::get('start-chatbot-project', 'ChatbotController@project');
    Route::post('submit-chatbot-project', 'ChatbotController@store');

    Route::post('signup', 'SignupController@store');
    Route::get('language/{lang}', 'LanguageController@store');

    Route::get('mailchimp/subscribed', 'SignupController@subscribed');
    Route::post('mailchimp/subscribed', 'SignupController@subscribed');

	Route::get('contact', 'ContactController@index');
	Route::post('contact', 'ContactController@store');

	Route::get('chatbots-usecases', 'ChatbotController@usecases');
	Route::get('chatbots', 'ChatbotController@index');
	//Route::get('chatbots/{chatbot}', 'ChatbotController@show');
});

Route::get('invitation/{token}', 'InvitationController@index');
Route::post('invitation/{token}', 'InvitationController@create');

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

$routeGroup = [
    'middleware' => ['auth', 'shop.owner'], 
    'prefix' => 'shop', 
    'namespace' => 'Shop'
];

Route::group($routeGroup, function() {
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/working-hours', 'WorkingHoursController@index');
    Route::post('/working-hours/update', 'WorkingHoursController@update');

    Route::resource('/categories', 'CategoryController');
    Route::post('/categories/upload', 'CategoryController@upload');

    Route::resource('/products', 'ProductController');
    Route::post('/products/upload', 'ProductController@upload');

    Route::get('/orders', 'OrderController@index');
    Route::get('/orders/{orderId}/edit', 'OrderController@edit');
    Route::post('/orders/{orderId}', 'OrderController@update');

    Route::get('/reports/dailySummary', 'ReportController@summary');
    Route::get('/reports', 'ReportController@index');

    // Settings
    Route::get('/settings', 'Settings\ShopController@edit');
    Route::post('/settings', 'Settings\ShopController@update');

    Route::post('/settings/uploadLogo', 'Settings\ShopController@uploadLogo');
    Route::post('/settings/uploadBanner', 'Settings\ShopController@uploadBanner');

    Route::get('/settings/order', 'Settings\OrderController@edit');
    Route::post('/settings/order', 'Settings\OrderController@update');
    Route::post('/settings/tax', 'Settings\OrderController@updateTax');

    Route::get('/settings/payments', 'Settings\PaymentController@edit');
    Route::post('/settings/payments', 'Settings\PaymentController@update');

    Route::get('/settings/services', 'Settings\ServiceController@edit');
    Route::post('/settings/services', 'Settings\ServiceController@update');

    // App Messenger
    Route::get('/apps/messenger', 'Apps\MessengerController@edit');
    Route::put('/apps/messenger', 'Apps\MessengerController@update');
    Route::put('/apps/messenger/disconnect', 'Apps\MessengerController@disconnect');

    // Facebook Auth
    Route::get('/apps/facebook/redirect', 'Apps\FacebookAuthController@redirectToProvider');
    Route::get('/apps/facebook/callback', 'Apps\FacebookAuthController@handleProviderCallback');
    Route::get('/apps/facebook/pages', 'Apps\FacebookAuthController@getPages');

    // App Order Receiving
    Route::get('/apps/order-receiving', 'Apps\OrderController@index');
});

$routeGroup = [
    'middleware' => ['auth', 'shop.owner'], 
    'prefix' => 'account', 
    'namespace' => 'Account'
];

Route::group($routeGroup, function() {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile/update','ProfileController@update');
    Route::post('/change-password/update','PasswordController@update');
    //Route::get('/plans', 'PlansController@index');
});

// Checkout
Route::group(['prefix' => 'shop'], function() {
    Route::get('checkout/{token}', 'CheckoutController@show');
});