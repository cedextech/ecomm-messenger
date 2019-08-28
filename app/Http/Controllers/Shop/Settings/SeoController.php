<?php

namespace App\Http\Controllers\Shop\Settings;

use Illuminate\Http\Response;
use App\Http\Requests\ConfigurationForm;
use App\Http\Controllers\Shop\BaseController;
use Illuminate\Support\Facades\Auth;

class SeoController extends BaseController
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
     * Show the setup form with old values.
     * 
     * @return [type] [description]
     */
    public function edit() 
    {
        $shop = $this->shop;

        return view('shop.settings.seo.index', compact('shop'));
    }

    /**
     * Update the setup.
     * 
     * @param  ConfigurationForm $form [description]
     * @return [type]                  [description]
     */
    public function update(ConfigurationForm $form) 
    {   
        $form->save();

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/setup');
    }
}