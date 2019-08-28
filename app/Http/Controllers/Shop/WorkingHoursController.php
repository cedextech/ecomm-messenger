<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopHour;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateWorkingHours;

class WorkingHoursController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $shopHour = $this->shop->workingHours;

        return view('shop.working-hours.edit', compact('shopHour'));
    }

    /**
     * Update working hours.
     *
     * @param $request
     * @return response.
     */
    public function update(UpdateWorkingHours $request)
    {   
        $request->save();

        flash('Working hours updated successfully!', 'success');
        
        return back();
    }
}
