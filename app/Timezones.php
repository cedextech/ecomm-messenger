<?php

namespace App;

use \DateTime;
use \DateTimeZone;

class Timezones
{
    public function create() {
        $regions = array(
            'Africa' => DateTimeZone::AFRICA,
            'America' => DateTimeZone::AMERICA,
            'Antarctica' => DateTimeZone::ANTARCTICA,
            'Aisa' => DateTimeZone::ASIA,
            'Atlantic' => DateTimeZone::ATLANTIC,
            'Europe' => DateTimeZone::EUROPE,
            'Indian' => DateTimeZone::INDIAN,
            'Pacific' => DateTimeZone::PACIFIC
        );
        
        foreach ($regions as $name => $mask) {
            $zones = DateTimeZone::listIdentifiers($mask);
            
            foreach($zones as $timezone) {
                // Lets sample the time there right now
                $time = new DateTime(NULL, new DateTimeZone($timezone));
        
                // Us dumb Americans can't handle millitary time
                $ampm = $time->format('H') > 12 ? ' ('. $time->format('g:i A'). ')' : '';

                // Remove region name and add a sample time
                $timezones[$name][$timezone] = substr($timezone, strlen($name) + 1) . ' - ' . $time->format('H:i') . $ampm;
            }
        }

        return $timezones;
    }
}