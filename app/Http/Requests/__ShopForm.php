<?php

namespace App\Http\Requests;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ShopForm extends FormRequest
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
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'address' => 'required|max:500',
            'latitude' => 'required|max:25',
            'longitude' => 'required|max:25'
        ];
    }
}
