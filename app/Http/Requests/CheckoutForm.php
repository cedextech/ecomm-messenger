<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutForm extends FormRequest
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
            'mobile' => 'required|numeric|phone',
            'city' => 'required|max:30',
            'street' => 'required|max:30',
            'zipcode' => 'required|max:10',
            'special_request' => 'max:150',
            'checkout_token' => 'required|checkout_token',
        ];
    }
}
