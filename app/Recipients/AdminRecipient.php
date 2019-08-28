<?php

namespace App\Recipients;

use Illuminate\Notifications\Notifiable;

class AdminRecipient
{
	use Notifiable;

	/**
	 * Administrator e-mail.
	 * 
	 * @var [type]
	 */
    protected $email;

    public function __contruct() 
    {
    	$this->email = 'kiran@cedextech.com';
    }
}