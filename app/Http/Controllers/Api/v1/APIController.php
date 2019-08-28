<?php

namespace App\Http\Controllers\Api\v1;

use Request;
use App\Traits\ShopTrait;
use App\Http\Controllers\Controller;
use App\Traits\APIAuthenticationTrait;

class APIController extends Controller 
{
    use APIAuthenticationTrait, ShopTrait;

    public function __construct()
    {
        $this->shop();
        $this->facebookUser();
        $this->boot();
    }

    /**
     * Send response.
     * 
     * @param  [type]  $response   [description]
     * @param  integer $httpStatus [description]
     * @return [type]              [description]
     */
    public function response($response, $httpStatus = 200) 
    {
        $response = array_merge($response, [
            'access_token' => $this->shop->facebook_page_access_token
        ]);

        return response()->json($response, $httpStatus);
    }
}