<?php

namespace App\Http\Controllers\Shop\Settings;

use LCountries;
use App\Timezones;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Events\ShopInfoUpdated;
use App\Http\Requests\UploadLogoPost;
use App\Http\Requests\UploadBannerPost;
use App\Http\Controllers\Shop\BaseController;

class ShopController extends BaseController
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

        $timezones = (new Timezones)->create();
        $countries = LCountries::all()->pluck('name', 'cca2');
        $currencies = LCountries::currencies();

        return view('shop.settings.index', compact('timezones', 'countries', 'shop', 'currencies'));
    }

    /**
     * Update the settings.
     *
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request)
    {
      // TODO
      // Validation not complete

        $this->validate($request, [
            'name' => 'required|max:191',
            'phone' => 'max:15',
            'timezone' => 'required',
            'country_iso' => 'required|cca2',
            'currency_code' => 'required|currency',
            'about' => 'required|max:1000',
            'location' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255'
        ]);

        $this->shop->name = $request->input('name');
        $this->shop->phone = $request->input('phone');
        $this->shop->country_iso = $request->input('country_iso');
        $this->shop->currency_code = $request->input('currency_code');
        $this->shop->timezone = $request->input('timezone');
        $this->shop->about = $request->input('about');
        $this->shop->location = $request->input('location');
        $this->shop->latitude = $request->input('latitude');
        $this->shop->longitude = $request->input('longitude');

        $this->shop->save();

        event(new ShopInfoUpdated($this->shop));

        flash('Shop information updated successfully.', 'success');

        return redirect('shop/settings');
    }

    /**
     * Upload the shop logo.
     *
     * @param  App\Http\Requests\UploadLogoPost $request
     * @return [type]           [description]
     */
    public function uploadLogo(UploadLogoPost $request)
    {
        $this->shop->logo = $request->file('file')->store('shop/logo');
        $this->shop->save();

        $data = [
            'status' => 'success',
            'logo_url' => $this->shop->logo
        ];

        return Response($data, 200);
    }

    /**
     * Upload the shop banner.
     *
     * @param  App\Http\Requests\UploadBannerPost $request
     * @return [type]           [description]
     */
    public function uploadBanner(UploadBannerPost $request)
    {
        $this->shop->banner = $request->file('file')->store('shop/banner');
        $this->shop->save();

        $data = [
            'status' => 'success',
            'banner_url' => $this->shop->banner
        ];

        return Response($data, 200);
    }
}
