<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductForm extends FormRequest
{   
    private $shop;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {   
        $this->shop = Auth::user()->shop;

        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $product = Product::findorFail($this->route('product'));

            return $product->shop_id == $this->shop->id;
        }

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
            'category_id' => [
                'required',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->where('shop_id', $this->shop->id);
                })
            ],
            'name' => 'required|max:255',
            'description' => 'max:255',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'price_discount' => '',
            'status' => 'required|in:0,1',
            'image' => 'max:255'
        ];
    }
}

