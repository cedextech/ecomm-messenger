<?php

namespace App\Http\Requests;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PageForm extends FormRequest
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

        $page = $this->shop->pages()->find($this->route('page'));

        return (empty($page)) ? false : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'content' =>  'required'
        ];
    }

    /**
     * Save the data.
     * 
     * @return [type] [description]
     */
    public function persist() 
    {   
        $attributes = [
            'title' => $this->input('title'),
            'content' => $this->input('content')
        ];

        $this->shop->pages()->updateExistingPivot($this->route('page'), $attributes);

        return true;
    }
}
