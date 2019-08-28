<?php

namespace App\Http\Controllers\Api\v1;

use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends APIController
{   
    /**
     * [$customerService description]
     * @var App\Services\CustomerService
     */
    private $customerService;

    public function __construct(CustomerService $customerService) 
    {
        parent::__construct();
        
        $this->customerService = $customerService;
    }

    /**
     * Register new facebook user as a customer.
     * 
     * @param  Request     $request     [description]
     * @return [type]                   [description]
     */
    public function store(Request $request) 
    {
        $customer = $this->customerService
            ->signup($this->shop, $request->input('facebook_id'));

        $response = [
            'status' => 'success',
            'data' => []
        ];

        return $this->response($response);
    }
}