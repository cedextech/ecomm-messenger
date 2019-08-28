<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadProductPost extends FormRequest
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
            'file' => 'required|image|max:5000'
        ];
    }

    /**
     * Customize the error message.
     * 
     * @return array
     */
    public function messages() 
    {
        return [
            'file.max' => 'Max upload file size is 5MB.',
        ];
    }
}
