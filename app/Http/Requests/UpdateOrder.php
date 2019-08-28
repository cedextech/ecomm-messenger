<?php

namespace App\Http\Requests;

use App\Models\Order;
use Illuminate\Validation\Rule;
use App\Notifications\OrderUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => [
                'required',
                'exists:orders,id,shop_id,' . Auth::user()->shop->id
            ],
            'order_status' => [
                'required', 
                Rule::in(array_keys(all_order_statuses()))
            ],
            'payment_status' => [
                'required', 
                Rule::in(array_keys(all_payment_statuses()))
            ]
        ];
    }

    /**
     * Save the order.
     * 
     * @return [type] [description]
     */
    public function save() 
    {
        $statusChanged = false;

        $order = Order::findOrFail($this->input('order_id'));

        if($order->status != $this->input('order_status')) {
            $statusChanged = true;
        }

        $order->status = $this->input('order_status');
        $order->payment_status = $this->input('payment_status');
        
        $order->save();

        if($statusChanged) {
            $order->customer->notify(new OrderUpdated($order, Auth::user()->shop));
        }

        return true;
    }
}
