<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostAppMessenger extends FormRequest
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
            'facebook_page_id' => 'required|exists:facebook_pages,page_id,user_id,' . Auth::id(),
        ];
    }

    /**
     * Save the value.
     * 
     * @return [type] [description]
     */
    public function save() 
    {
        $user = Auth::user();

        $facebookPage = $user->facebookPages()
                            ->where('page_id', $this->input('facebook_page_id'))
                            ->firstOrFail();

        $shop = $user->shop;

        $shop->facebook_page_id = $facebookPage->page_id;
        $shop->facebook_page_access_token = $facebookPage->access_token;
        
        $shop->save();

        return true;
    }
}
