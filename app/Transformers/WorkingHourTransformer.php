<?php

namespace App\Transformers;

class WorkingHourTransformer extends Transformer
{
    /**
     * Transform object into a generic array
     *
     * @param  [type] $resource [description]
     * @return [type]           [description]
     */
    public function transform($resource)
    {
        return [
            'id' => (int) $resource['id'],
            'day' => (int) $resource['day'],
            'day_text' => $resource['day_text'],
            'morning_opening_time' => $resource['opening_1'],
            'morning_closing_time' => $resource['closing_1'],
            'evening_opening_time' => $resource['opening_2'],
            'evening_closing_time' => $resource['closing_2'],
            'shop_status' => (int) $resource['opened_or_closed']
        ];
    }
}
