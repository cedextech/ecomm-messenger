<?php

namespace App\Providers;

use App\Models\Checkout;
use App\Models\Customer;
use App\Models\Invite;
use App\Models\Shop;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // TODO
        // Move custom validation rules to seperate class

        Validator::extend('valid_shop', function ($attribute, $value, $parameters, $validator) {
            $shop = Shop::where('uid', $value)->get();

            return !$shop->isEmpty();
        });

        Validator::extend('valid_facebook_customer', function ($attribute, $value, $parameters, $validator) {
            $customer = Customer::where('facebook_id', $value)
                            ->join('shops', 'shops.id', '=', 'customers.shop_id')
                            ->where('shops.uid', $parameters[0])
                            ->get();

            return !$customer->isEmpty();
        });

        Validator::extend('invitation_token', function ($attribute, $value, $parameters, $validator) {
            $invitation = Invite::where('token', $value)->get();

            return !$invitation->isEmpty();
        });

        Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
            return preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
        });

        Validator::replacer('phone', function($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, ':attribute is invalid phone number');
        });

        Validator::extend('checkout_token', function ($attribute, $value, $parameters, $validator) {
            $checkout = Checkout::where('token', $value)->first();

            return ($checkout) ? true : false;
        });

        /* \DB::listen(function ($query) {
            echo $query->sql;
        });
        */
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
