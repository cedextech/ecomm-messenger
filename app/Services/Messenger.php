<?php

namespace App\Services;

use Tgallice\FBMessenger\Client;
use Tgallice\FBMessenger\Model\Button\WebUrl;
use Tgallice\FBMessenger\Model\Button\Postback;
use Tgallice\FBMessenger\Messenger as MessengerBase;

class Messenger
{   
    /**
     * Set the page access token.
     * 
     * @param  [type] $pageAccessToken [description]
     * @return [type]                  [description]
     */
    public function page($pageAccessToken) 
    {
        $this->pageAccessToken = $pageAccessToken;

        return $this;
    }

    /**
     * Facebook page scope user id.
     * 
     * @param  [type] $facebookId [description]
     * @return [type]             [description]
     */
    public function to($facebookId) 
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * Set the greeting text.
     * 
     * @param [type] $text [description]
     */
    public function setGreetingText($text)
    {
        return MessengerBase::create($this->pageAccessToken)
                ->setGreetingText($text);
    }

    /**
     * Delete the greeting text.
     * 
     * @return [type] [description]
     */
    public function deleteGreetingText() 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->deleteGreetingText();
    }

    /**
     * Set the get started button.
     * 
     */
    public function setStartedButton() 
    {   
        $payload = json_encode([
            'action' => 'get_started',
            'data' => ''
        ]);

        return MessengerBase::create($this->pageAccessToken)
                ->setStartedButton($payload);
    }

    /**
     * Delete the get started button.
     * 
     * @return [type] [description]
     */
    public function deleteStartedButton() 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->deleteStartedButton();
    }

    /**
     * Set the persistent menu.
     * 
     */
    public function setPersistentMenu() 
    {
        $buttons = [
            new PostBack('Order Now', json_encode([
                'action' => 'show_categories',
                'data' => ''
            ])),
            new PostBack('About Store', json_encode([
                'action' => 'shop_learn_more',
                'data' => ''
            ])),
            new WebUrl('Powered By Onchatbot', 'https://www.onchatbot.com/'),
        ];

        return MessengerBase::create($this->pageAccessToken)
                ->setPersistentMenu($buttons);
    }

    /**
     * Delete the persistent menu.
     * 
     * @return [type] [description]
     */
    public function deletePersistentMenu() 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->deletePersistentMenu();
    }

    /**
     * Subscribe app to the page.
     * 
     * @return [type] [description]
     */
    public function subscribeAppToPage() 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->subscribe();
    }

    /**
     * Unsubscribe app from the page.
     * 
     * @return [type] [description]
     */
    public function unsubscribeAppFromPage() 
    {   
        $client = new Client($this->pageAccessToken);

        return $client->delete('/me/subscribed_apps');
    }

    /**
     * Get the user profile.
     * 
     * @return [type] [description]
     */
    public function profile() 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->getUserProfile($this->facebookId);
    }

    /**
     * Send the message.
     * 
     * @param  [type] $message [description]
     * @return [type]          [description]
     */
    public function send($message) 
    {
        return MessengerBase::create($this->pageAccessToken)
                ->sendMessage($this->facebookId, $message);
    }
}