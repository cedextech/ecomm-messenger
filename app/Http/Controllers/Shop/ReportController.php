<?php

namespace App\Http\Controllers\Shop;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\OrderService;

class ReportController extends BaseController
{   
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the last 7 days orders count and sales.
     * 
     * @return [type] [description]
     */
    public function summary(OrderService $orderService) 
    {
        $data = $orderService->summaryBetweenDates($this->shop->id);

        return Response($data, 200);
    }

    /**
     * Order and sales report.
     * 
     * @return [type] [description]
     */
    public function index(Request $request, OrderService $orderService)
    {
        $startDate = $request->input('start_date') ?: Carbon::now()->addDays(-10)->format('Y-m-d');
        $endDate = $request->input('end_date') ?: Carbon::now()->format('Y-m-d');

        $reports = $orderService->reportBetweenDates($this->shop->id, $startDate, $endDate);

        return view('shop.reports.index', compact('reports', 'startDate', 'endDate'));
    }
}