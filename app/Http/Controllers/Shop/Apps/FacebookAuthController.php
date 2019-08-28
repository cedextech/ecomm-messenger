<?php

namespace App\Http\Controllers\Shop\Apps;

use Socialite;
use App\Models\User;
use App\Services\AppService;
use App\Http\Controllers\Shop\BaseController;

class FacebookAuthController extends BaseController
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
     * Redirect to Facebook.
     * 
     * @return [type] [description]
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')
                ->scopes(['manage_pages', 'pages_messaging'])->redirect();   
    }   

    /**
     * After authentication, handle the user.
     * 
     * @return [type] [description]
     */
    public function handleProviderCallback(AppService $appService)
    {
        $facebookUser = Socialite::driver('facebook')->user();

        if($appService->facebookPages($facebookUser->token)) {
            flash('Shop has been integrated to Messenger successfully.', 'success');
        }
        else {
            flash('Something wrong has happened. Please try again.', 'error');
        }

        return redirect('shop/apps/messenger');
    }
}