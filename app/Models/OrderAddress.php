<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $appends = ['full_address'];

    /**
     * Full address of the customer.
     * 
     * @return [type] [description]
     */
    public function getFullAddressAttribute() 
    {
        return $this->name . "\n" . 
                $this->mobile . "\n" .
                $this->city . "\n" .
                $this->location . "\n" .
                $this->zipcode . "\n";
    }
}
