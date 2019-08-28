<?php

use CommerceGuys\Intl\Formatter\NumberFormatter;
use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Intl\NumberFormat\NumberFormatRepository;

/**
 * Make the sidebar menu active.
 * 
 * @param [type] $path   [description]
 * @param string $active [description]
 */
function set_active($path, $active = 'active') 
{
    return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

/**
 * Get the payment status label.
 * 
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function payment_status_label($status)
{
    if($status == 'pending') {
        return 'label-danger';
    }

    elseif($status == 'payed') {
        return 'label-success';
    }
}

/**
 * Get the order status label.
 * 
 * @param  [type] $status [description]
 * @return [type]         [description]
 */
function order_status_label($status)
{
    if($status == 'pending') {
        return 'label-warning';
    }

    elseif($status == 'confirmed') {
        return 'label-primary';
    }

    elseif($status == 'delivered') {
        return 'label-success';
    }

    elseif($status == 'cancelled' || $status == 'rejected') {
        return 'label-danger';
    }
}

/**
 * Order statuses list.
 * 
 * @return [type] [description]
 */
function all_order_statuses()
{
    return [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'delivered' => 'Delivered',
        'cancelled' => 'Cancelled',
        'rejected' => 'Rejected'
    ];
}

/**
 * Payment statuses list.
 * 
 * @return [type] [description]
 */
function all_payment_statuses()
{
    return [
        'pending' => 'Pending',
        'payed' => 'Payed'
    ];
}

/**
 * Format the currency.
 * 
 * @param  [type] $amount [description]
 * @return [type]         [description]
 */
function format_currency($amount, $currencyCode = null) 
{
    $currencyRepository = new CurrencyRepository;
    $numberFormatRepository = new NumberFormatRepository;
    
    $numberFormat = $numberFormatRepository->get('en');
    $currencyCode = ($currencyCode) ?: Config::get('app.currency_code');

    $currencyFormatter = new NumberFormatter($numberFormat, NumberFormatter::CURRENCY);

    return $currencyFormatter->formatCurrency($amount, $currencyRepository->get($currencyCode));
}