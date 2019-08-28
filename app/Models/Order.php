<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\UuidsTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use UuidsTrait;

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Append the accessors or not.
     * 
     * @var boolean
     */
    public static $withoutAppends = false;

    protected $appends = [
        'checkout_type_text',
        'status_text',
        'payment_status_text',
        'payment_mode_text',
        'total',
        'tax_amount'
    ];

    const ORDER_STATUS_PENDING = 'pending';
    const ORDER_STATUS_CONFIRMED = 'confirmed';
    const ORDER_STATUS_DELIVERED = 'delivered';
    const ORDER_STATUS_CANCELLED = 'cancelled';
    const ORDER_STATUS_REJECTED = 'rejected';

    const PAYMENT_STATUS_PENDING = 'pending';
    const PAYMENT_STATUS_MADE = 'payed';

    const CHECKOUT_DELIVERY = 'delivery';
    const CHECKOUT_PICKUP = 'pickup';

    const PAYMENT_MODE_DELIVERY_CASH = 'delivery_cash';
    const PAYMENT_MODE_DELIVERY_CARD = 'delivery_card';
    const PAYMENT_MODE_PICKUP_CASH = 'pickup_cash';
    const PAYMENT_MODE_PICKUP_CARD = 'pickup_card';

    /**
     * Get the arrayable
     * 
     * @return [type] [description]
     */
    protected function getArrayableAppends()
    {
        if(self::$withoutAppends){
            return [];
        }

        return parent::getArrayableAppends();
    }

    /**
     * Customer address.
     * 
     * @return [type] [description]
     */
    public function customer_address()
    {
        return $this->hasOne('App\Models\OrderAddress');
    }

    /**
     * Ordered products.
     * 
     * @return [type] [description]
     */
    public function products() 
    {
        return $this->hasMany('App\Models\OrderProduct');
    }

    /**
     * Customer the order belongs to.
     * 
     * @return [type] [description]
     */
    public function customer() 
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * Text for status
     * 
     * @return string
     */
    public function getStatusTextAttribute() 
    {
        switch ($this->status) {
            case 'pending':
                $text = 'Pending';
                break;

            case 'confirmed':
                $text = 'Confirmed';
                break;

            case 'delivered':
                $text = 'Delivered';
                break;

            case 'cancelled':
                $text = 'Cancelled';
                break;

            case 'rejected':
                $text = 'Rejected';
                break;

            default:
                $text = '';
        }

        return $text;
    }

    /**
     * Text for checkout_type
     * 
     * @return string
     */
    public function getCheckoutTypeTextAttribute () 
    {
        switch ($this->checkout_type) {
            case 'delivery':
                $text = 'Delivery';
                break;

            case 'pickup':
                $text = 'Pickup';
                break;

            default:
                $text = '';
        }

        return $text;
    }

    /**
     * Text for payment_status
     * 
     * @return string
     */
    public function getPaymentStatusTextAttribute() 
    {
        switch ($this->payment_status) {
            case 'pending':
                $text = 'Pending';
                break;

            case 'payed':
                $text = 'Payed';
                break;

            default:
                $text = '';
        }

        return $text;
    }

    /**
     * Text for payment_mode
     * 
     * @return string
     */
    public function getPaymentModeTextAttribute() 
    {
        switch ($this->payment_mode) {
            case 'delivery_cash':
                $text = 'Cash on delivery';
                break;

            case 'delivery_card':
                $text = 'Card to delivery person';
                break;

            case 'pickup_cash':
                $text = 'Cash on pickup';
                break;

            case 'pickup_card':
                $text = 'Card on pickup';
                break;

            default:
                $text = '';
        }

        return $text;
    }

    /**
     * Filter order by date.
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  string $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByDate($query, $date)
    {   
        if(!is_null($date)) {
            return $query->whereRaw('date(created_at) = ?', [$date]);
        }
        
        return $query->whereRaw('date(created_at) = ?', [Carbon::now()->format('Y-m-d')]);
    }

    /**
     * Get the order total.
     * 
     * @return [type] [description]
     */
    public function getTotalAttribute() 
    {
        return $this->subtotal + $this->delivery_fee + $this->tax_amount;
    }

    /**
     * Get the order tax amount.
     * 
     * @return [type] [description]
     */
    public function getTaxAmountAttribute() 
    {
        return $this->subtotal * ($this->tax / 100);
    }


    /**
     * Order reference exists.
     * 
     * @param  [type] $query  [description]
     * @param  [type] $number [description]
     * @return [type]         [description]
     */
    public function scopeReferenceExists($query, $number) 
    {
        return $query->where('reference', $number);
    }
}