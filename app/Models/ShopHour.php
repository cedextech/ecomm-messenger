<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopHour extends Model
{
    protected $fillable = ['opening_1', 'closing_1', 'opening_2', 'closing_2', 'opened_or_closed', 'day'];

    protected $appends = [
        'day_text',
    ];

    /**
     * Get the day text from day number.
     * 
     * @return [type] [description]
     */
    public function getDayTextAttribute() 
    {   
        $days = [
            1 => 'Mon', 
            2 => 'Tue', 
            3 => 'Wed', 
            4 => 'Thu', 
            5 => 'Fri', 
            6 => 'Sat', 
            7 => 'Sun'
        ];

        return $days[$this->day];
    }
}
