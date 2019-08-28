<?php

namespace App\Http\Requests;

use App\Models\ShopHour;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateWorkinghours extends FormRequest
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
        // TODO
        // Time validation

        foreach (range(1, 7) as $day) {
            $rules['opening_1.*'] = 'required';
            $rules['closing_1.*'] = 'required';
            $rules['opening_2.*'] = 'required';
            $rules['closing_2.*'] = 'required';
        }

        return $rules;
    }

    /**
     * Save the working hours.
     * 
     * @return [type] [description]
     */
    public function save() 
    {
        $shop = Auth::user()->shop;

        foreach (range(1, 7) as $day) {
            $data = [
                'opening_1' => $this->input('opening_1')[$day],
                'closing_1' => $this->input('closing_1')[$day],
                'opening_2' => $this->input('opening_2')[$day],
                'closing_2' => $this->input('closing_2')[$day],
                'opened_or_closed' => isset($this->input('opened_or_closed')[$day]) ? 1 : 0,
            ];
            
            ShopHour::where('day', $day)
                ->where('shop_id', $shop->id)
                ->update($data);
        }
    }
}
