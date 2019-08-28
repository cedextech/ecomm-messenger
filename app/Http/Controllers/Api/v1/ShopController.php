<?php

namespace App\Http\Controllers\Api\v1;

use App\Transformers\ShopTransformer;

class ShopController extends APIController
{   
    /**
     * @var App\Transformers\ShopTransformer
     */
    protected $shopTransformer;

    public function __construct (ShopTransformer $shopTransformer)
    {
        parent::__construct();
        
        $this->shopTransformer = $shopTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = [
            'status' => 'success',
            'data' => $this->shopTransformer->transform($this->shop)
        ];

        return $this->response($response);
    }

    /**
     * Return the services the shop provides (delivery or pickup)
     * 
     * @return [type] [description]
     */
    public function services() 
    {
        $response = [
            'status' => 'success',
            'data' => [
                'has_pickup' => (bool) $this->shop->has_pickup,
                'has_delivery' => (bool) $this->shop->has_delivery
            ]
        ];

        return $this->response($response);
    }

    /**
     * Return the shop access token.
     * 
     * @return [type] [description]
     */
    public function accessToken() 
    {
        $response = [
            'status' => 'success',
            'data' => ''
        ];

        return $this->response($response);
    }
}