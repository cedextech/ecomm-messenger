<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    { 
        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $category = Category::findorFail($this->route('category'));

            return $category->shop_id == Auth::user()->shop->id;
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
            'name' => 'required|max:255',
            'description' => 'max:255',
            'image' => 'max:255',
            'status' => 'required|in:0,1'
        ];
    }
}
