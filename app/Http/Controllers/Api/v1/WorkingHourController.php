<?php

namespace App\Http\Controllers\Api\v1;

use Request;
use App\Models\ShopHour;
use App\Http\Controllers\Controller;
use App\Transformers\WorkingHourTransformer;

class WorkingHourController extends APIController
{
    /**
     * @var App\Transformers\WorkingHourTransformer
     */
    protected $workingHourTransformer;

    public function __construct (WorkingHourTransformer $workingHourTransformer)
    {
        parent::__construct();
               
        $this->workingHourTransformer = $workingHourTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $shopHour = $this->shop->workingHours->toArray();

        $response = [
            'status' => 'success',
            'data' => $this->workingHourTransformer->transformCollection($shopHour)
        ];

        return $this->response($response);
    }
}