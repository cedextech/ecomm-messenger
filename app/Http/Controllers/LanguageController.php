<?php

namespace App\Http\Controllers;

use Session;
use Redirect;

class LanguageController extends Controller
{
    /**
     * Save the selected lang in session.
     * 
     * @param  [type] $lang [description]
     * @return [type]       [description]
     */
    public function store($lang) 
    {
        $languages = ['en', 'fr', 'sp', 'de'];

        if(!in_array($lang, $languages)) {
            $lang = 'en';
        }

        Session::put('language', $lang);

        return Redirect::back();
    }
}