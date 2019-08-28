<?php

namespace App\Services;

use Auth;
use Facebook\Facebook;
use App\Models\FacebookPage;

class AppService extends AppIntegration
{
    /**
     * Fetch the facebook pages the user owned.
     * 
     * @param  [type] $accessToken [description]
     * @return [type]              [description]
     */
    public function facebookPages($accessToken) 
    {
        $user = Auth::user();

        $facebook = new Facebook([
            'app_id' => config('services.facebook.client_id'),
            'app_secret' => config('services.facebook.client_secret'),
            'default_graph_version' => 'v2.9',
            'default_access_token' => $accessToken
        ]);

        $response = $facebook->get('/me/accounts')->getDecodedBody();

        $this->saveFacebookPages($response, $user);

        $this->installMessenger($user->shop);

        return true;
    }

    /**
     * Save the facebook page IDs and access tokens.
     * 
     * @param  [type] $response [description]
     * @param  [type] $user     [description]
     * @return [type]           [description]
     */
    public function saveFacebookPages($response, $user) 
    {
        if(empty($response)) {
            return false;
        }

        foreach($response['data'] as $page) {
            $pages[] = new FacebookPage([
                'name' => $page['name'],
                'page_id' => $page['id'],
                'access_token' => $page['access_token']
            ]);
        }

        return $user->facebookPages()->saveMany($pages);
    }
}