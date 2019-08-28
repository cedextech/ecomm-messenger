<?php

namespace App\Http\Controllers\Shop\Apps;

use Auth;
use App\Services\AppService;
use App\Events\ConnectedToFacebookPage;
use App\Http\Requests\PostAppMessenger;
use App\Events\DisconnectedFromFacebookPage;
use App\Http\Controllers\Shop\BaseController;

class MessengerController extends BaseController
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
     * Show the messenger configuration form.
     * 
     * @param  AppService $appService [description]
     * @return [type]                 [description]
     */
    public function edit(AppService $appService) 
    {   
        $user = Auth::user();

        $facebookPages = $user->facebookPages;
        $shop = $user->shop;
        $connectedPage = $facebookPages->whereIn('page_id', [$shop->facebook_page_id])->flatten();

        return view('shop.apps.messenger', compact('connectedPage', 'facebookPages', 'shop'));
    }

    /**
     * Connect to the Facebook page.
     * 
     * @return [type] [description]
     */
    public function update(PostAppMessenger $request) 
    {   
        $request->save();

        event(new ConnectedToFacebookPage($this->shop));

        flash('Shop has been integrated to Messenger successfully.', 'success');

        return redirect('shop/apps/messenger');
    }

    /**
     * Disconnect the messener app.
     * 
     * @return [type] [description]
     */
    public function disconnect() 
    {
        $this->shop->facebook_page_id = null;
        $this->shop->save();

        event(new DisconnectedFromFacebookPage($this->shop));

        flash('Shop has been disconnected from Messenger successfully.', 'success');

        return redirect('shop/apps/messenger');
    }
}
